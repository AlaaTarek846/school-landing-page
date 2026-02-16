<template>
    <div class="modal fade" id="class-rooms-model" tabindex="-1"
         aria-labelledby="exampleModalLgLabel" aria-hidden="true" >
        <div class="modal-dialog  modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel">
                        {{type == 'create' ? $t('global.add') : $t('global.update')}}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      
                      <!-- Title AR -->
                      <div class="col-md-6 mb-2">
                        <label class="form-label">العنوان (عربي)</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$.title_ar.$model"
                               :class="{'is-invalid': v$.title_ar.$error || errors[`title_ar`],
                                     'is-valid': !v$[`title_ar`].$invalid && !errors[`title_ar`]}">
                        <div class="invalid-feedback" v-if="v$.title_ar.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                      <!-- Title EN -->
                      <div class="col-md-6 mb-2">
                        <label class="form-label">العنوان (English)</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$.title_en.$model"
                               :class="{'is-invalid': v$.title_en.$error || errors[`title_en`],
                                     'is-valid': !v$[`title_en`].$invalid && !errors[`title_en`]}">
                         <div class="invalid-feedback" v-if="v$.title_en.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>
                      
                      <!-- Educational Stage -->
                       <div class="col-md-12 mb-2">
                        <label class="form-label">المرحلة الدراسية</label>
                         <Dropdown v-model="v$.educational_stage_id.$model" :options="stages" optionLabel="title_ar" optionValue="id" placeholder="اختار المرحلة" class="w-100 md:w-14rem" 
                         :class="{'is-invalid': v$.educational_stage_id.$error}" />
                         <div class="invalid-feedback" v-if="v$.educational_stage_id.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button v-if="type != 'edit'" :disabled="!is_disabled"
                            @click.prevent="resetModal" type="button" class="btn btn-secondary">{{$t('global.AddNewRecord')}}</button>
                    <template v-if="!is_disabled">
                        <button type="submit" v-if="!loading" @click.prevent="AddSubmit" class="btn btn-primary">{{ $t('global.Submit') }}</button>

                        <button class="btn btn-primary btn-loader" v-else>
                            <span class="me-2">{{$t('global.Loading')}}</span>
                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
  import {computed, onMounted, reactive, ref, toRefs, watch, nextTick, defineEmits} from "vue";
  import {useI18n} from "vue-i18n";
  import {maxLength, minLength, required, numeric, requiredIf, url} from "@vuelidate/validators";
  import useVuelidate from "@vuelidate/core";

  import adminApi from "../../../api/adminAxios";
  import Dropdown from 'primevue/dropdown';

  const props = defineProps({
      type: {default: 'create'},
      dataRow: {default: ''},
  });

  const emit = defineEmits(['created','getStatus']);
  const stages = ref([]);

  setTimeout(async () => {
    let myModalEl = document.getElementById('class-rooms-model')
    myModalEl.addEventListener('show.bs.modal', function (event) {
      resetModal();
    })
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
      resetModalHidden();
    })
  }, 150);
  const errors = ref([]);
  let loading = ref(false);
  let is_disabled = ref(false);
  const { t } = useI18n({});
  const id = ref(null);

  onMounted(() => {
      // Fetch Stages for dropdown
      adminApi.get('educational-stages?per_page=100').then((res)=>{
          stages.value = res.data.data;
      });
  });

  function defaultData(){
    submitData.data.title_ar = '';
    submitData.data.title_en = '';
    submitData.data.educational_stage_id = null;
    
    is_disabled.value = false;
    loading.value = false;
    errors.value = [];
  }

  function resetModal() {
    defaultData();
    setTimeout(async () => {
      if (props.type != 'edit') {
      } else {
        id.value = props.dataRow.id;
        
        loading.value = true;
         adminApi.get(`class-rooms/${id.value}`)
            .then((res) => {
              let l = res.data.data;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_en = l.title_en;
              submitData.data.educational_stage_id = l.educational_stage_id;
            })
            .catch((err) => {
              console.log(err);
            })
            .finally(() => {
              loading.value = false;
            })
      }
    }, 50);
  }

  function resetModalHidden() {
    defaultData();
    nextTick(() => { v$.value.$reset() });
  }

  const submitData =  reactive({
    data:{
      title_ar: '',
      title_en: '',
      educational_stage_id: '',
    }
  });

  const rules = computed(() => {
    return {
      title_ar: {required},
      title_en: {required},
      educational_stage_id: {required},
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {
      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('title_en', submitData.data.title_en);
      formData.append('educational_stage_id', submitData.data.educational_stage_id);

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`class-rooms`, formData)
              .then((res) => {
                Swal.fire({
                  icon: 'success',
                  title: `${t('global.AddedSuccessfully')}`,
                  showConfirmButton: false,
                  timer: 1500
                });
                emit("created");
                is_disabled.value = true;
              })
              .catch((err) => {
                errors.value = err.response?.data?.errors;
              })
              .finally(() => {
                loading.value = false;
              });
        }
      }else if(!v$.value.$error) {
        is_disabled.value = false;
        loading.value = true;
        formData.append('_method','PUT');
        adminApi.post(`class-rooms/${id.value}`,formData)
            .then((res) => {
              Swal.fire({
                icon: 'success',
                title: `${t('global.EditSuccessfully')}`,
                showConfirmButton: false,
                timer: 1500
              });
              emit("created");
            })
            .catch((err) => {
              errors.value = err.response?.data?.errors;
            })
            .finally(() => {
              loading.value = false;
            });
      }
}

</script>
