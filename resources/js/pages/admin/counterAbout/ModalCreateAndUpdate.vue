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
                        <label class="form-label">العداد</label>
                        <input type="number" class="form-control form-control-lg"  v-model="v$.count.$model"
                               :class="{'is-invalid': v$.count.$error || errors[`count`],
                                   'is-valid': !v$.count.$invalid && !errors[`count`]}">

                        <div class="invalid-feedback">
                          <span v-if="v$.count.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                        <template v-if="errors[`count`]">
                          <error-message v-for="(errorMessage, index) in errors[`count`]" :key="index">
                            {{ errorMessage }}
                          </error-message>
                        </template>
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
  import {maxLength, minLength, required, numeric, requiredIf, minValue} from "@vuelidate/validators";
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
        title: {minLength: minLength(1),maxLength:maxLength(100),required,},
      }
    });
    submitData.data.count = 0;
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

        adminApi.get(`counter-abouts/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              l.translations.forEach((el)=>{
                submitData.data[el.locale]={
                  title:el.title,
                }
                submitData.data.count = l.count;
              });
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
      count: 0,
    }
  });

  const rules = computed(() => {
    return {
      ...langValidation.value,
      count: { required, minValue: minValue(0) }
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {

      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      languages.value.forEach((el)=>{
        formData.append(`translations[${el}][title]`, submitData.data[el].title);
        formData.append(`translations[${el}][description]`, submitData.data[el].description);
      });
    formData.append('count', submitData.data.count);

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`counter-abouts`, formData)
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
        adminApi.post(`counter-abouts/${id.value}`,formData)
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
