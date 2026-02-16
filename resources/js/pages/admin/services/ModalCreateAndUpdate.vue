<template>
    <div class="modal fade" id="area-model" tabindex="-1"
         aria-labelledby="exampleModalLgLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel">
                        {{type == 'create' ? $t('global.add') : $t('global.update')}}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mt-2 mb-3">
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
                       
                         <div class="col-md-6 mb-2">
                          <label class="form-label">{{ $t('global.title_ar') }}</label>

                          <input
                            type="text"
                            class="form-control form-control-lg"
                            v-model="v$.title_ar.$model"
                            :class="{
                              'is-invalid': v$.title_ar.$error || errors['title_ar'],
                              'is-valid': !v$.title_ar.$invalid && !errors['title_ar']
                            }"
                          />

                          <div class="invalid-feedback">
                           <span v-if="v$.title_ar.required.$invalid">
                            {{ $t('validation.fieldRequired') }}<br />
                          </span>

                           <span v-if="v$.title_ar.minLength?.$invalid">
                            {{ $t('validation.TitleArIsMustHaveAtMost') }}
                            {{ v$.title_ar.minLength.$params.min }}
                            {{ $t('validation.Letters') }}<br />
                          </span>

                            <span v-if="v$.title_ar.maxLength?.$invalid">
                              {{ $t('validation.TitleArIsMustHaveAtLeast') }}
                              {{ v$.title_ar.maxLength.$params.max }}
                              {{ $t('validation.Letters') }}<br />
                            </span>

                            <template v-if="errors['title_ar']">
                              <error-message
                                v-for="(errorMessage, index) in errors['title_ar']"
                                :key="index"
                              >
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                      </div>
                        <div class="col-md-6 mb-2">
                          <label class="form-label">{{ $t('global.title_en') }}</label>

                          <input
                            type="text"
                            class="form-control form-control-lg"
                            v-model="v$.title_en.$model"
                            :class="{
                              'is-invalid': v$.title_en.$error || errors['title_en'],
                              'is-valid': !v$.title_en.$invalid && !errors['title_en']
                            }"
                          />

                          <div class="invalid-feedback">
                            <span v-if="v$.title_en.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                            <span v-if="v$.title_en.minLength?.$invalid">
                              {{ $t('validation.TitleEnIsMustHaveAtMost') }}
                              {{ v$.title_en.minLength.$params.min }}
                              {{ $t('validation.Letters') }}<br />
                            </span>

                            <span v-if="v$.title_en.maxLength?.$invalid">
                              {{ $t('validation.TitleEnIsMustHaveAtLeast') }}
                              {{ v$.title_en.maxLength.$params.max }}
                              {{ $t('validation.Letters') }}<br />
                            </span>

                            <template v-if="errors['title_en']">
                              <error-message
                                v-for="(errorMessage, index) in errors['title_en']"
                                :key="index"
                              >
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                      </div>



                       <div class="col-md-6 mb-2">
                          <label class="form-label">{{ $t('global.description_ar') }}</label>

                          

                         <Editor ref="descRef" :modules="customModules" v-model="v$.description_ar.$model"></Editor>

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


                          <Editor ref="descRef" :modules="customModules" v-model="v$.description_en.$model"></Editor>

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

                        <div class="col-md-6 mb-2">
                          <label class="form-label">{{ $t('global.quote_ar') }}</label>

                          <Editor ref="descRef" :modules="customModules" v-model="v$.quote_ar.$model"></Editor>

                          <div class="invalid-feedback">
                           <span v-if="v$.quote_ar.required.$invalid">
                            {{ $t('validation.fieldRequired') }}<br />
                          </span>

                           <span v-if="v$.quote_ar.minLength?.$invalid">
                            {{ $t('validation.QuoteArIsMustHaveAtMost') }}
                            {{ v$.quote_ar.minLength.$params.min }}
                            {{ $t('validation.Letters') }}<br />
                          </span>

                            <span v-if="v$.quote_ar.maxLength?.$invalid">
                              {{ $t('validation.QuoteArIsMustHaveAtLeast') }}
                              {{ v$.quote_ar.maxLength.$params.max }}
                              {{ $t('validation.Letters') }}<br />
                            </span>

                            <template v-if="errors['quote_ar']">
                              <error-message
                                v-for="(errorMessage, index) in errors['quote_ar']"
                                :key="index"
                              >
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                      </div>
                        <div class="col-md-6 mb-2">
                          <label class="form-label">{{ $t('global.quote_en') }}</label>

                          <Editor ref="descRef" :modules="customModules" v-model="v$.quote_en.$model"></Editor>

                          <div class="invalid-feedback">
                            <span v-if="v$.quote_en.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                            <span v-if="v$.quote_en.minLength?.$invalid">
                              {{ $t('validation.QuoteEnIsMustHaveAtMost') }}
                              {{ v$.quote_en.minLength.$params.min }}
                              {{ $t('validation.Letters') }}<br />
                            </span>

                            <span v-if="v$.quote_en.maxLength?.$invalid">
                              {{ $t('validation.QuoteEnIsMustHaveAtLeast') }}
                              {{ v$.quote_en.maxLength.$params.max }}
                              {{ $t('validation.Letters') }}<br />
                            </span>

                            <template v-if="errors['quote_en']">
                              <error-message
                                v-for="(errorMessage, index) in errors['quote_en']"
                                :key="index"
                              >
                                {{ errorMessage }}
                              </error-message>
                            </template>
                          </div>
                      </div>

                      

                        <div class="col-md-12 mt-3">
                          <label class="form-label">صورة (339 * 655) </label>
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

                                    <span v-if="!imageUpload && !submitData.data.image" style="margin-top:35%;">
                                        <br><i class="bi bi-cloud-upload fs-40" style="font-size: 85px;"></i>
                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                    </span>

                                <input name="mediaPackageUpload" type="file" @change="preview"
                                       id="photoPersonal1" accept="image/*">

                                <div id="container-images" class="row justify-content-center h-100"></div>

                                <div v-if="imageUpload && !submitData.data.image" class="row justify-content-center h-100">
                                  <figure class="col-3" v-if="!imageUpload.mime_type.includes('application/pdf')">
                                    <img :src="imageUpload.url" class="img-fluid rounded h-100 w-100 m-1" />
                                  </figure>
                                  <figure class="col-3" v-else>
                                    <img src="/assets/images/pdf.png" class="img-fluid rounded h-100 w-100 m-1" />
                                  </figure>
                                </div>

                                <div class="col-md-12 my-1" v-if="v$.image.$error">
                                  <span class="text-danger" v-if="v$.image.required.$invalid">{{ $t('validation.fieldRequired') }}<br /></span>
                                </div>
                                <template v-if="errors['image']">
                                  <error-message v-for="(errorMessage, index) in errors['image']" :key="index">
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
  import {maxLength, minLength, required, numeric, between, integer, requiredIf} from "@vuelidate/validators";
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


  function defaultData(){
    submitData.data.status = true;
    submitData.data.image = '';
    submitData.data.title_en = '';
    submitData.data.title_ar = '';
    submitData.data.description_en = '';
    submitData.data.description_ar = '';
    submitData.data.quote_ar = '';
    submitData.data.quote_en = '';
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

        adminApi.get(`services/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              imageUpload.value = l.image;
              submitData.data.title_en = l.title_en;
              submitData.data.title_ar = l.title_ar;
              submitData.data.description_en = l.description_en;
              submitData.data.description_ar = l.description_ar;
              submitData.data.status = l.status == 1;
              submitData.data.quote_en = l.quote_en;
              submitData.data.quote_ar = l.quote_ar;

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
      title_en: '',
      title_ar: '',
      description_en: '',
      description_ar: '',
      quote_en: '',
      quote_ar: '',
    }
  });

  const rules = computed(() => {
    return {
      ...langValidation.value,
      image: {required: requiredIf( (value) => {
          return props.type == 'create' || !imageUpload.value;
        })
      },
      // pdf: {required: requiredIf( (value) => {
      //     return props.type == 'create' || !pdfUpload.value;
      //   })
      // },

      title_en: {required,minLength: minLength(5),maxLength: maxLength(191)},
      title_ar: {required,minLength: minLength(5),maxLength: maxLength(191)},
      description_en: {required,minLength: minLength(5)},
      description_ar: {required,minLength: minLength(5)},
      quote_en: {required,maxLength:  minLength(5),maxLength: maxLength(191)},
      quote_ar: {required,maxLength:  minLength(5),maxLength: maxLength(191)},
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {

      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('status', submitData.data.status ? 1 : 0);
      formData.append('description_ar', submitData.data.description_ar);
      formData.append('description_en', submitData.data.description_en);
      formData.append('title_en', submitData.data.title_en);
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('quote_en', submitData.data.quote_en);
      formData.append('quote_ar', submitData.data.quote_ar);

    if(submitData.data.image) {
      formData.append('image', submitData.data.image);
    }



      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`services`, formData)
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
        adminApi.post(`services/${id.value}`,formData)
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
      submitData.data.image = {};
      submitData.data.image = e.target.files[0];
      if(submitData.data.image.type.includes('application/')) {
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
        reader.readAsDataURL(submitData.data.image);
      }

    }

  };


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
