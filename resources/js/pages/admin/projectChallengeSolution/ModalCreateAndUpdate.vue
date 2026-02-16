<template>
    <div class="modal fade" id="area-model" 
         aria-labelledby="exampleModalLgLabel"  >
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel">
                        {{type == 'create' ? $t('global.add') : $t('global.update')}}
                    </h6>
                    <a href="#"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                          <label class="form-label">{{ $t('label.projects') }}</label>
                          <Select v-model="submitData.data.project_id"
                            :options="dataProjects"
                            option-label="title_ar"
                            option-value="id"
                            :placeholder="$t('label.projects')"
                            class="w-full  w-100"></Select>
                          <div class="invalid-feedback" style="display: block">
                            <template v-if="errors['project_id']">
                              <error-message
                                v-for="(errorMessage, index) in errors['project_id']"
                                :key="index"
                              >
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                      </div>
                       <div class="col-md-12 mb-2">
                          <label class="form-label">{{ $t('label.sort') }}</label>

                          <input
                            type="number"
                            class="form-control form-control-lg"
                            v-model="v$.sort.$model"
                            :class="{
                              'is-invalid': v$.sort.$error || errors['sort'],
                              'is-valid': !v$.sort.$invalid && !errors['sort']
                            }"
                          />

                          <div class="invalid-feedback">
                            <span v-if="v$.sort.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                            <span v-if="v$.sort.minValue?.$invalid">
                              {{ $t('validation.SortMustBeAtLeast') }}
                              {{ v$.sort.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                            <template v-if="errors['sort']">
                              <error-message
                                v-for="(errorMessage, index) in errors['sort']"
                                :key="index"
                              >
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                      </div>
                       
                          <div class="col-md-12 mb-2" >
              <label class="form-label">{{ $t('label.title') }} ( عربي )</label>
              <input type="text" class="form-control form-control-lg" v-model="v$.title_ar.$model" :class="{
                'is-invalid': v$.title_ar.$error || errors[`title_ar`],
                'is-valid': !v$.title_ar.$invalid && !errors[`title_ar`]
              }">

              <div class="invalid-feedback">
                <span v-if="v$.title_ar.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                <span v-if="v$.title_ar.minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                  v$.title_ar.minLength.$params.min
                }} {{ $t('validation.Letters') }} <br />
                </span>
                <span v-if="v$.title_ar.maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                  v$.title_ar.maxLength.$params.max
                }} {{ $t('validation.Letters') }}
                </span>
              </div>
              <template v-if="errors[`title_ar`]">
                <error-message v-for="(errorMessage, index) in errors[`title_ar`]" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>
            <div class="col-md-12 mb-2" >
              <label class="form-label">{{ $t('label.title') }} ( English )</label>
              <input type="text" class="form-control form-control-lg" v-model="v$.title_en.$model" :class="{
                'is-invalid': v$.title_en.$error || errors[`title_en`],
                'is-valid': !v$.title_en.$invalid && !errors[`title_en`]
              }">

              <div class="invalid-feedback">
                <span v-if="v$.title_en.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                <span v-if="v$.title_en.minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                  v$.title_en.minLength.$params.min
                }} {{ $t('validation.Letters') }} <br />
                </span>
                <span v-if="v$.title_en.maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                  v$.title_en.maxLength.$params.max
                }} {{ $t('validation.Letters') }}
                </span>
              </div>
              <template v-if="errors[`title_en`]">
                <error-message v-for="(errorMessage, index) in errors[`title_en`]" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>

                        <div class="col-md-12 mt-2">
                            <div class="custom-toggle-switch d-flex align-items-center mt-4">
                                <input id="toggleswitchPrimary" v-model="submitData.data.status" type="checkbox">
                                <label for="toggleswitchPrimary" class="label-primary"></label><span class="ms-3">{{ $t('label.status') }}</span>
                            </div>
                            <template v-if="errors['status']">
                                <error-message v-for="(errorMessage, index) in errors['status']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
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
  import {maxLength, minLength, required, numeric, between, integer, requiredIf} from "@vuelidate/validators";
  import useVuelidate from "@vuelidate/core";
  import adminApi from "../../../api/adminAxios";
  import {useStore} from "vuex";

  const props = defineProps({
      type: {default: 'create'},
      dataRow: {default: ''},
      dataProjects: {default: []}
  });

  const emit = defineEmits(['created','getStatus']);

  setTimeout(async () => {
    let myModalEl = document.getElementById('area-model')
    myModalEl.addEventListener('show.bs.modal', function (event) {
      resetModal();
    })
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
      resetModalHidden();
    })
  }, 150);
  const errors = ref([]);
  const areas = ref([]);
  const languages = ref([]);
  const cities = ref([]);
  const langValidation = ref({});
  let loading = ref(false);
  let is_disabled = ref(false);
  const { t } = useI18n({});
  const store = useStore();
  const id = ref(null);
  



  function defaultData(){
    submitData.data.status = true;
    submitData.data.title_en = '';
    submitData.data.title_ar = '';
    submitData.data.project_id = '';
    submitData.data.sort = '';
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

        adminApi.get(`project-challenge-solutions/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              submitData.data.title_en = l.title_en;
              submitData.data.title_ar = l.title_ar;
              submitData.data.project_id = l.project_id;
              submitData.data.status = l.status == 1;
              submitData.data.sort = l.sort;

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
  //start design
  const submitData =  reactive({
    data:{
      status: true,
      title_en: '',
      title_ar: '',
      project_id: '',
      sort: ''
    }
  });

  const rules = computed(() => {
    return {
      ...langValidation.value,
      title_en: {required,minLength: minLength(5),maxLength: maxLength(191)},
      title_ar: {required,minLength: minLength(5),maxLength: maxLength(191)},
      project_id: {required},
      sort: {required,integer,between: (value) => {
          if(value === undefined || value === null || value === '') return true;
          return value >= 1 && value <= 15;
      }
      }
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {

      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('status', submitData.data.status ? 1 : 0);
      formData.append('title_en', submitData.data.title_en);
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('project_id', submitData.data.project_id);
      formData.append('sort', submitData.data.sort);

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`project-challenge-solutions`, formData)
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
        adminApi.post(`project-challenge-solutions/${id.value}`,formData)
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

<style scoped>
.ml-3 {
  margin-left: 1.5rem;
}

.waves-effect {
  position: relative;
  overflow: hidden;
  cursor: pointer;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  width: 200px;
  height: 50px;
  text-align: center;
  line-height: 34px;
  margin: auto;
}

input[type="file"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
  cursor: pointer;
  filter: alpha(opacity=0);
  opacity: 0;
}

.waves-effect[data-v-d8970579] {
  background-color: #e9e9e9;
}

</style>
