<template>
    <div class="modal fade" id="facility-details-model" tabindex="-1"
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
                        <label class="form-label">{{ $t('global.TitleAr') }}</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$.title_ar.$model"
                               :class="{'is-invalid': v$.title_ar.$error || errors[`title_ar`],
                                     'is-valid': !v$[`title_ar`].$invalid && !errors[`title_ar`]}">
                        <div class="invalid-feedback" v-if="v$.title_ar.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                      <!-- Title EN -->
                      <div class="col-md-6 mb-2">
                        <label class="form-label">{{ $t('global.TitleEn') }}</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$.title_en.$model"
                               :class="{'is-invalid': v$.title_en.$error || errors[`title_en`],
                                     'is-valid': !v$[`title_en`].$invalid && !errors[`title_en`]}">
                         <div class="invalid-feedback" v-if="v$.title_en.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                      <!-- Count -->
                      <div class="col-md-6 mb-2">
                        <label class="form-label">{{ $t('global.count') }}</label>
                        <input type="number" class="form-control form-control-lg"  v-model="v$.count.$model"
                               :class="{'is-invalid': v$.count.$error || errors[`count`],
                                     'is-valid': !v$[`count`].$invalid && !errors[`count`]}">
                         <div class="invalid-feedback" v-if="v$.count.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                      <!-- Facility Dropdown -->
                      <div class="col-md-6 mb-2">
                          <label class="form-label">Facility</label>
                          <select class="form-control" v-model="v$.facility_id.$model"
                                  :class="{'is-invalid': v$.facility_id.$error || errors[`facility_id`],
                                        'is-valid': !v$[`facility_id`].$invalid && !errors[`facility_id`]}">
                              <option v-for="facility in facilities" :key="facility.id" :value="facility.id">
                                  {{ facility.title_ar }} / {{ facility.title_en }}
                              </option>
                          </select>
                          <div class="invalid-feedback" v-if="v$.facility_id.$error">
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
  import {maxLength, minLength, required, numeric, requiredIf, url, minValue} from "@vuelidate/validators";
  import useVuelidate from "@vuelidate/core";
  import adminApi from "../../../api/adminAxios";

  const props = defineProps({
      type: {default: 'create'},
      dataRow: {default: ''},
  });

  const emit = defineEmits(['created','getStatus']);

  setTimeout(async () => {
    let myModalEl = document.getElementById('facility-details-model')
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
  const facilities = ref([]);

  function getFacilities() {
      adminApi.get('facilities-dropdown')
          .then((res) => {
              facilities.value = res.data;
          })
          .catch((err) => {
              console.log(err);
          });
  }

  onMounted(() => {
      getFacilities();
  });

  function defaultData(){
    submitData.data.title_ar = '';
    submitData.data.title_en = '';
    submitData.data.count = '';
    submitData.data.facility_id = '';
    
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
         adminApi.get(`facility-details/${id.value}`)
            .then((res) => {
              let l = res.data.data;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_en = l.title_en;
              submitData.data.count = l.count;
              submitData.data.facility_id = l.facility_id;
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
      count: '',
      facility_id: '',
    }
  });

  const rules = computed(() => {
    return {
      title_ar: {required},
      title_en: {required},
      count: {required, numeric, minValue: minValue(1)},
      facility_id: {required},
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {
      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('title_en', submitData.data.title_en);
      formData.append('count', submitData.data.count);
      formData.append('facility_id', submitData.data.facility_id);

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`facility-details`, formData)
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
        adminApi.post(`facility-details/${id.value}`,formData)
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
