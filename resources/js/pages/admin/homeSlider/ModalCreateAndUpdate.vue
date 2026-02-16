<template>
    <div class="modal fade" id="area-model" tabindex="-1"
         aria-labelledby="exampleModalLgLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel">
                        {{type == 'create' ? $t('global.add') : $t('global.update')}}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6 mb-2" v-for="lang in languages">
                        <label class="form-label">{{ $t('label.title') }} فرعي ({{ lang == 'ar' ? 'عربي' : 'English' }})</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$[`title_color_${lang}`].$model"
                               :class="{'is-invalid': v$[`title_color_${lang}`].$error || errors[`title_color_${lang}`],
                                   'is-valid': !v$[`title_color_${lang}`].$invalid && !errors[`title_color_${lang}`]}">

                        <div class="invalid-feedback">
                          <span v-if="v$[`title_color_${lang}`].required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                          <span v-if="v$[`title_color_${lang}`].minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                              v$[`title_color_${lang}`].minLength.$params.min
                            }} {{ $t('validation.Letters') }} <br />
                                </span>
                          <span v-if="v$[`title_color_${lang}`].maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                              v$[`title_color_${lang}`].maxLength.$params.max
                            }} {{ $t('validation.Letters') }}
                                </span></div>
                        <template v-if="errors[`title_color_${lang}`]">
                          <error-message v-for="(errorMessage, index) in errors[`title_color_${lang}`]" :key="index">
                            {{ errorMessage }}
                          </error-message>
                        </template>
                      </div>
                      <div class="col-md-6 mb-2" v-for="lang in languages">
                        <label class="form-label">{{ $t('label.title') }} ({{ lang == 'ar' ? 'عربي' : 'English' }})</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$[`title_${lang}`].$model"
                               :class="{'is-invalid': v$[`title_${lang}`].$error || errors[`title_${lang}`],
                                   'is-valid': !v$[`title_${lang}`].$invalid && !errors[`title_${lang}`]}">

                        <div class="invalid-feedback">
                          <span v-if="v$[`title_${lang}`].required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                          <span v-if="v$[`title_${lang}`].minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                              v$[`title_${lang}`].minLength.$params.min
                            }} {{ $t('validation.Letters') }} <br />
                                </span>
                          <span v-if="v$[`title_${lang}`].maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                              v$[`title_${lang}`].maxLength.$params.max
                            }} {{ $t('validation.Letters') }}
                                </span></div>
                        <template v-if="errors[`title_${lang}`]">
                          <error-message v-for="(errorMessage, index) in errors[`title_${lang}`]" :key="index">
                            {{ errorMessage }}
                          </error-message>
                        </template>
                      </div>

                      <div class="col-md-6 mb-2">
                        <label class="form-label">{{ $t('global.description_ar') }}</label>



                        <textarea
                            class="form-control summernote"
                            rows="4"
                            v-model.trim="v$.description_ar.$model"
                            :class="{'is-invalid': v$.description_ar.$error ||errors.description_ar,
                                    'is-valid':!v$.description_ar.$invalid && !errors.description_ar}">
                            </textarea>



                        <div class="invalid-feedback">
                           <span v-if="v$.description_ar.required.$invalid">
                            {{ $t('validation.fieldRequired') }}<br />
                          </span>

                          <span v-if="v$.description_ar.minLength?.$invalid">
                            {{ $t('validation.DescriptionArIsMustHaveAtMost') }}
                            {{ v$.description_ar.minLength.$params.min }}
                            {{ $t('validation.Letters') }}<br />
                          </span>


                          <template v-if="errors['description_ar']">
                            <error-message
                                v-for="(errorMessage, index) in errors['description_ar']"
                                :key="index"
                            >
                              {{ errorMessage }}
                            </error-message>
                          </template>
                        </div>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-label">{{ $t('global.description_en') }}</label>


                        <textarea
                            class="form-control summernote"
                            rows="4"
                            v-model.trim="v$.description_en.$model"
                            :class="{'is-invalid': v$.description_en.$error ||errors.description_en,
                                    'is-valid':!v$.description_en.$invalid && !errors.description_en}">
                            </textarea>

                        <div class="invalid-feedback">
                            <span v-if="v$.description_en.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                          <span v-if="v$.description_en.minLength?.$invalid">
                              {{ $t('validation.DescriptionEnIsMustHaveAtMost') }}
                              {{ v$.description_en.minLength.$params.min }}
                              {{ $t('validation.Letters') }}<br />
                            </span>



                          <template v-if="errors['description_en']">
                            <error-message
                                v-for="(errorMessage, index) in errors['description_en']"
                                :key="index"
                            >
                              {{ errorMessage }}
                            </error-message>
                          </template>
                        </div>
                      </div>

                        <div class="col-md-6 mt-2">
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
  import {maxLength, minLength, required, numeric, requiredIf, integer,url} from "@vuelidate/validators";
  import useVuelidate from "@vuelidate/core";
  import adminApi from "../../../api/adminAxios";
  import {useStore} from "vuex";

  import Editor from 'primevue/editor';

  const components = { Editor };
  const customModules = ref({
    toolbar: [
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block'],

      [{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
      [{ 'direction': 'rtl' }],                        // text direction

      [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

      [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults
      [{ 'font': [] }],
      [{ 'align': [] }],

      ['clean']                                         // remove formatting button
    ],
    theme: 'bubble',
  })
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
  const imageUpload = ref('');

  onMounted(()=>{
    languages.value = store.state.lang.languages;
  });

  function defaultData(){
    submitData.data.status = true;
    submitData.data.image = '';
    submitData.data.description_ar = '';
    submitData.data.description_en = '';
    submitData.data.title_color_ar = '';
    submitData.data.title_color_en = '';
    submitData.data.title_ar = '';
    submitData.data.title_en = '';
    is_disabled.value = false;
    loading.value = false;
    errors.value = [];
    imageUpload.value = '';
    submitData.data.image = '';
    let i = document.querySelector('#container-images');
    if(i) { i.innerHTML = ''; }
  }
  function resetModal() {
    defaultData();
    setTimeout(async () => {
      if (props.type != 'edit') {
      } else {
        id.value = props.dataRow.id;

        adminApi.get(`home-sliders/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              submitData.data.description_ar = l.description_ar;
              submitData.data.description_en = l.description_en;
              submitData.data.title_en = l.title_en;
              submitData.data.title_color_en = l.title_color_en;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_color_ar = l.title_color_ar;
              submitData.data.status = l.status == 1;
              submitData.data.status = l.status == 1;
              // imageUpload.value = l.background;
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
      image: '',
      description_ar: '',
      description_en: '',
      title_color_en: '',
      title_color_ar: '',
      title_en: '',
      title_ar: '',
    }
  });

  const rules = computed(() => {
    return {
      title_ar: {minLength: minLength(1),maxLength:maxLength(100),required,},
      title_en: {minLength: minLength(1),maxLength:maxLength(100),required,},
      title_color_ar: {minLength: minLength(1),maxLength:maxLength(100),required,},
      title_color_en: {minLength: minLength(1),maxLength:maxLength(100),required,},
      description_ar: {minLength: minLength(1),maxLength:maxLength(500),required,},
      description_en: {minLength: minLength(1),maxLength:maxLength(500),required,},


    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {

      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('title_en', submitData.data.title_en);
      formData.append('title_color_ar', submitData.data.title_color_ar);
      formData.append('title_color_en', submitData.data.title_color_en);
      formData.append('description_ar', submitData.data.description_ar);
      formData.append('description_en', submitData.data.description_en);
      formData.append('status', submitData.data.status ? 1 : 0);



      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`home-sliders`, formData)
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
        adminApi.post(`home-sliders/${id.value}`,formData)
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
