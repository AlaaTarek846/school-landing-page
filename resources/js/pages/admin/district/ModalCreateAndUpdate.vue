<template>
    <div class="modal fade" id="area-model" tabindex="-1"
         aria-labelledby="exampleModalLgLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel">
                        {{type == 'create' ? $t('global.add') : $t('global.update')}}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2" v-if="submitData.data.ar" v-for="lang in languages">
                            <label class="form-label">{{ $t('label.title') }} ({{ lang == 'ar' ? 'عربي' : 'English' }})</label>
                            <input type="text" class="form-control form-control-lg"  v-model="v$[lang].title.$model"
                                   :class="{'is-invalid': v$[lang].title.$error || errors[`translations.${lang}.title`],
                                   'is-valid': !v$[lang].title.$invalid && !errors[`translations.${lang}.title`]}">

                            <div class="invalid-feedback">
                                <span v-if="v$[lang].title.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                                <span v-if="v$[lang].title.minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                                        v$[lang].title.minLength.$params.min
                                    }} {{ $t('validation.Letters') }} <br />
                                </span>
                                <span v-if="v$[lang].title.maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                                        v$[lang].title.maxLength.$params.max
                                    }} {{ $t('validation.Letters') }}
                                </span></div>
                            <template v-if="errors[`translations.${lang}.title`]">
                                <error-message v-for="(errorMessage, index) in errors[`translations.${lang}.title`]" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>
                        <div class="col-md-12 mb-2">
                          <label class="form-label">{{ $t('global.selectArea') }}</label>

                          <Select @change="getCities(v$.area_id.$model)" v-model="v$.area_id.$model" :filterFields="['id','title']" :options="areas" filter
                                  :invalid="v$.area_id.$error || errors[`area_id`]"
                                  optionLabel="title" optionValue="id"
                                  :class="['w-full w-100', { 'is-invalid': v$.area_id.$error || errors[`area_id`], 'is-valid': !v$.area_id.$invalid && !errors[`area_id`] }]">

                          </Select>
                          <div class="invalid-feedback">
                              <span v-if="v$.area_id.required.$invalid">{{
                                  $t('global.ThisFieldIsRequired') }}<br />
                              </span>
                          </div>
                          <template v-if="errors['area_id']">
                            <error-message v-for="(errorMessage, index) in errors['area_id']" :key="index">
                              {{ errorMessage }}
                            </error-message>
                          </template>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label">{{ $t('global.selectCity') }}</label>

                          <Select v-model="v$.city_id.$model" :filterFields="['id','title']" :options="cities" filter
                                  :invalid="v$.city_id.$error || errors[`city_id`]"
                                  optionLabel="title" optionValue="id"
                                  :class="['w-full w-100', { 'is-invalid': v$.city_id.$error || errors[`city_id`], 'is-valid': !v$.city_id.$invalid && !errors[`city_id`] }]">

                          </Select>
                          <div class="invalid-feedback">
                              <span v-if="v$.city_id.required.$invalid">{{
                                  $t('global.ThisFieldIsRequired') }}<br />
                              </span>
                          </div>
                          <template v-if="errors['city_id']">
                            <error-message v-for="(errorMessage, index) in errors['city_id']" :key="index">
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
  import {maxLength, minLength, required,numeric} from "@vuelidate/validators";
  import useVuelidate from "@vuelidate/core";
  import adminApi from "../../../api/adminAxios";
  import {useStore} from "vuex";

  const props = defineProps({
      type: {default: 'create'},
      dataRow: {default: ''},
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

  onMounted(()=>{
    languages.value = store.state.lang.languages;
  });

  function defaultData(){

    languages.value.forEach((el)=>{
      submitData.data[el]={title:''};
      langValidation.value[el] ={
        title: {minLength: minLength(1),maxLength:maxLength(40),required,}
      }
    });
    submitData.data.area_id = '';
    submitData.data.city_id = '';
    submitData.data.status = true;
    is_disabled.value = false;
    loading.value = false;
    errors.value = [];
    cities.value = [];
  }
  function resetModal() {
    defaultData();
    setTimeout(async () => {
      if (props.type != 'edit') {
      } else {
        id.value = props.dataRow.id;

        adminApi.get(`districts/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              l.translations.forEach((el)=>{
                submitData.data[el.locale]={
                  title:el.title,
                }
              });
              submitData.data.status = l.status == 1;
              submitData.data.area_id = l.area_id;
              getCities(l.area_id);
              submitData.data.city_id = l.city_id;
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
  let getAreas = () => {
    loading.value = true;

    adminApi.get(`areas/dropdown`)
        .then((res) => {
          let l = res.data.data;
          areas.value = l;
        })
        .catch((err) => {
          console.log(err.response.data);
        })
        .finally(() => {
          loading.value = false;
        })
  }
  let getCities = (id) => {
    loading.value = true;
    submitData.data.city_id = null;
    adminApi.get(`cities/city-by-area/${id}`)
        .then((res) => {
          let l = res.data.data;
          cities.value = l;
        })
        .catch((err) => {
          console.log(err.response.data);
        })
        .finally(() => {
          loading.value = false;
        })
  }
  //start design
  const submitData =  reactive({
    data:{
      area_id: null,
      city_id: null,
      status: true,
    }
  });

  const rules = computed(() => {
    return {
      ...langValidation.value,
      area_id: {required},
      city_id: {required},
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {

      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      languages.value.forEach((el)=>{
        formData.append(`translations[${el}][title]`, submitData.data[el].title);
      });
      formData.append('status', submitData.data.status ? 1 : 0);
      formData.append('area_id', submitData.data.area_id);
      formData.append('city_id', submitData.data.city_id);
      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`districts`, formData)
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
        adminApi.post(`districts/${id.value}`,formData)
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

  onMounted(() => {
    getAreas();
  })

</script>
