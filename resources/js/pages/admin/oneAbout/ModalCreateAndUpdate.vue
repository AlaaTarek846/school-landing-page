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
                      <div class="col-md-6 mt-3" v-for="lang in languages">
                        <label class="form-label">{{ $t('label.description') }} ({{ lang == 'ar' ? 'عربي' : 'English' }})</label>
                        <textarea
                            class="form-control summernote"
                            rows="4"
                            v-model.trim="v$[`description_${lang}`].$model"
                            :class="{'is-invalid': v$[`description_${lang}`].$error ||errors[`description_${lang}`],
                                    'is-valid':!v$[`description_${lang}`].$invalid && !errors[`description_${lang}`]}">
                            </textarea>
                        <template v-if="errors[`description_${lang}`]">
                          <error-message v-for="(errorMessage, index) in errors[`description_${lang}`]" :key="index">
                            {{ errorMessage }}
                          </error-message>
                        </template>
                      </div>
                        <h4 class="my-2">التفاصيل</h4>
                        <div class="row" v-for="(detail, index) in submitData.data.details" :key="index">
                          <div class="col-xl-5 mt-1" v-for="lang in languages">
                            <label class="form-label">{{ $t('label.title') }} ({{ lang == 'ar' ? 'عربي' : 'English' }})</label>
                            <input type="text" class="form-control form-control-lg"  v-model="submitData.data.details[index][`title_${lang}`]"
                                   :class="{ 'is-invalid': v$.details.$each.$response.$data[index][`title_${lang}`].$error || errors[`details[${index}][title_${lang}]`],
                                    'is-valid': !v$.details.$each.$response.$data[index][`title_${lang}`].$invalid && !errors[`details[${index}][title_${lang}]`] }">
                            <div class="invalid-feedback">
                                <span v-if="v$.details.$each.$response.$data[index][`title_${lang}`].required.$invalid">{{
                                    $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors[`details[${index}][title_${lang}]`]">
                              <error-message v-for="(errorMessage, index) in errors[`details[${index}][title_${lang}]`]" :key="index">
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                          <div class="col-md-2 mt-1" style="line-height: 85px;">
                            <button
                                type="button" class="btn btn-danger btn-sm mx-1"
                                @click="removeSize(index)"
                                :title="$t('global.Delete')"
                                v-if="submitData.data.details.length > 1"
                            >
                              <i class="ri-delete-bin-line"></i>
                            </button>
                            <button
                                type="button" class="btn btn-success btn-sm"
                                :title="$t('global.addLine')"
                                v-if="(submitData.data.details.length - 1) == index"
                                @click="addSizeDetail"
                            >
                              <i class="ri-add-line"></i>
                            </button>
                          </div>
                        </div>
                        <div class="col-md-12 mt-3">
                          <label class="form-label">صورة  (498 * 460)</label>
                          <div class="row img-div-position">
                            <div class="col-12 text-end">
                              <button
                                  type="button" class="btn btn-danger btn-sm"
                                  @click="imageUpload = ''"
                                  v-if="imageUpload"
                              >
                                {{ $t('global.deleteImage') }}
                              </button>
                            </div>
                            <div class="col-md-12 mt-3 d-flex flex-wrap flex-fill h-100">
                              <div class="btn btn-outline-light waves-effect" style="width: 100%; height:90%">

                                    <span v-if="!imageUpload && !submitData.data.first_photo" style="margin-top:35%;">
                                        <br><i class="bi bi-cloud-upload fs-40" style="font-size: 85px;"></i>
                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                    </span>

                                <input name="mediaPackageUpload" type="file" @change="preview"
                                       id="photoPersonal1" accept="image/*">

                                <div id="container-images" class="row justify-content-center h-100"></div>

                                <div v-if="imageUpload && !submitData.data.first_photo" class="row justify-content-center h-100">
                                  <figure class="col-3" v-if="!imageUpload.mime_type.includes('application/pdf')">
                                    <img :src="imageUpload.url" class="img-fluid rounded h-100 w-100 m-1" />
                                  </figure>
                                  <figure class="col-3" v-else>
                                    <img src="/assets/images/pdf.png" class="img-fluid rounded h-100 w-100 m-1" />
                                  </figure>
                                </div>

                                <div class="col-md-12 my-1" v-if="v$.first_photo.$error">
                                  <span class="text-danger" v-if="v$.first_photo.required.$invalid">{{ $t('validation.fieldRequired') }}<br /></span>
                                </div>
                                <template v-if="errors['first_photo']">
                                  <error-message v-for="(errorMessage, index) in errors['first_photo']" :key="index">
                                    {{ errorMessage }}
                                  </error-message>
                                </template>

                              </div>

                            </div>
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
  import {maxLength, minLength, required, numeric, requiredIf, minValue, helpers, url} from "@vuelidate/validators";
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
  const langValidation2 = ref({});
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

    submitData.data.description_ar = '';
    submitData.data.description_en = '';
    submitData.data.title_ar = '';
    submitData.data.title_color_ar = '';
    submitData.data.title_en = '';
    submitData.data.title_color_en = '';
    submitData.data.status = true;
    submitData.data.first_photo = '';
    submitData.data.details = [{}];
    let langSize = {};
    languages.value.forEach((el)=>{
        let title = `title_${el}`;
        submitData.data.details[0][title] = '';
        langSize[title] = {minLength: minLength(1),maxLength:maxLength(200), required};
     });
    langValidation2.value = {
        $each: helpers.forEach({
          ...langSize,
        })
    };
    is_disabled.value = false;
    loading.value = false;
    errors.value = [];
    imageUpload.value = '';
    let i = document.querySelector('#container-images');
    if(i) { i.innerHTML = ''; }
  }
  function resetModal() {
    defaultData();
    setTimeout(async () => {
      if (props.type != 'edit') {
      } else {
        id.value = props.dataRow.id;

        adminApi.get(`one-abouts/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              imageUpload.value = l.first_photo;
              submitData.data.description_ar = l.description_ar;
              submitData.data.description_en = l.description_en;
              submitData.data.title_en = l.title_en;
              submitData.data.title_color_en = l.title_color_en;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_color_ar = l.title_color_ar;
              submitData.data.details = [];
              l.details.forEach((el,index) => {
                submitData.data.details.push({});
                languages.value.forEach((n)=>{
                  let title = `title_${n}`;
                  submitData.data.details[index][title] = el[title];
                });
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
      description_ar: '',
      description_en: '',
      title_en: '',
      title_ar: '',
      title_color_en: '',
      title_color_ar: '',
      status: true,
      first_photo: '',
      details: []
    }
  });

  const rules = computed(() => {
    return {
      title_ar: {minLength: minLength(1),maxLength:maxLength(100),required,},
      title_color_ar: {minLength: minLength(1),maxLength:maxLength(100),required,},
      title_en: {minLength: minLength(1),maxLength:maxLength(100),required,},
      title_color_en: {minLength: minLength(1),maxLength:maxLength(100),required,},
      description_ar: {minLength: minLength(1),maxLength:maxLength(200),required,},
      description_en: {minLength: minLength(1),maxLength:maxLength(200),required,},
      details: {
        ...langValidation2.value,
      },
      first_photo: {required: requiredIf( (value) => {
          return props.type == 'create' || !imageUpload.value;
        })
      },
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
      if(submitData.data.first_photo) {
        formData.append('first_photo', submitData.data.first_photo);
      }
      submitData.data.details.forEach((el,index)=>{
        languages.value.forEach((e)=>{
          formData.append(`details[${index}][title_${e}]`, submitData.data.details[index][`title_${e}`]);
        });
      });

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`one-abouts`, formData)
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
        adminApi.post(`one-abouts/${id.value}`,formData)
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

  const preview = (e) => {
    let containerImages = document.querySelector("#container-images");
    containerImages.innerHTML = "";

    if(e) {
      submitData.data.first_photo = {};
      submitData.data.first_photo = e.target.files[0];
      if(submitData.data.first_photo.type.includes('application/')) {
        let figure = document.createElement('figure');
        figure.className = 'col-3';
        let img = document.createElement('img');
        img.className = 'img-fluid rounded h-100 w-100 m-1';
        img.setAttribute('src', '/assets/images/pdf.png');
        figure.appendChild(img);
        containerImages.appendChild(figure);
      }else {
        let reader = new FileReader();
        let figure = document.createElement('figure');
        figure.className = 'col-3';

        reader.onload = () => {
          let img = document.createElement('img');
          img.className = 'img-fluid rounded h-100 w-100 m-1';
          img.setAttribute('src', reader.result);
          figure.appendChild(img);
        }

        containerImages.appendChild(figure);
        reader.readAsDataURL(submitData.data.first_photo);
      }

    }

  };

  function removeSize(index) {
    submitData.data.details.splice(index, 1);
  }
  function addSizeDetail(index) {
    submitData.data.details.push({});
    languages.value.forEach((el)=>{
      submitData.data.details[submitData.data.details.length - 1][`title_${el}`] = '';
    });
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
