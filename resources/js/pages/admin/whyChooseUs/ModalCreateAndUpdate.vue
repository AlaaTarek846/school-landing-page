<template>
    <div class="modal fade" id="why-choose-us-model" tabindex="-1"
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

                       <!-- Description AR -->
                      <div class="col-md-12 mb-2">
                        <label class="form-label">المحتوي (عربي)</label>
                        <Editor ref="descRef" :modules="customModules" v-model="v$.description_ar.$model"></Editor>
                         <div class="invalid-feedback" v-if="v$.description_ar.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                       <!-- Description EN -->
                      <div class="col-md-12 mb-2">
                        <label class="form-label">المحتوي (English)</label>
                        <Editor ref="descRef" :modules="customModules" v-model="v$.description_en.$model"></Editor>
                         <div class="invalid-feedback" v-if="v$.description_en.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                        <div class="col-md-12 mt-3">
                          <label class="form-label">{{ $t('global.image') }}</label>
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

                                    <span v-if="!imageUpload" style="margin-top:35%;">
                                        <br><i class="bi bi-cloud-upload fs-40" style="font-size: 85px;"></i>
                                    </span>

                                <input name="mediaPackageUpload" type="file" @change="preview"
                                       id="photoPersonal1" accept="image/*">



                                <div v-if="imageUpload" class="row justify-content-center h-100">
                                   <figure class="col-3">
                                    <img :src="imageUpload.url ? imageUpload.url : imageUpload" class="img-fluid rounded h-100 w-100 m-1" />
                                  </figure>
                                </div>
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
  import {maxLength, minLength, required, numeric, requiredIf, url} from "@vuelidate/validators";
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
    let myModalEl = document.getElementById('why-choose-us-model')
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
  const store = useStore();
  const id = ref(null);
  const imageUpload = ref('');

  function defaultData(){
    submitData.data.title_ar = '';
    submitData.data.title_en = '';
    submitData.data.description_ar = '';
    submitData.data.description_en = '';
    submitData.data.image = '';
    
    is_disabled.value = false;
    loading.value = false;
    errors.value = [];
    imageUpload.value = '';

  }

  function resetModal() {
    defaultData();
    setTimeout(async () => {
      if (props.type != 'edit') {
      } else {
        id.value = props.dataRow.id;
        
        loading.value = true;
        // Using direct data from props if available to avoid extra call, or fetch if needed
        // Assuming adminApi.get call is safer for latest data
         adminApi.get(`why-choose-us/${id.value}`)
            .then((res) => {
              let l = res.data.data;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_en = l.title_en;
              submitData.data.description_ar = l.description_ar;
              submitData.data.description_en = l.description_en;
              imageUpload.value = l.image; // URL
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
      description_ar: '',
      description_en: '',
      image: '',
    }
  });

  const rules = computed(() => {
    return {
      title_ar: {required},
      title_en: {required},
      description_ar: {required},
      description_en: {required},
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {
      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('title_en', submitData.data.title_en);
      formData.append('description_ar', submitData.data.description_ar);
      formData.append('description_en', submitData.data.description_en);
      
      if(submitData.data.image && typeof submitData.data.image !== 'string') {
          formData.append('image', submitData.data.image);
      }

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`why-choose-us`, formData)
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
        adminApi.post(`why-choose-us/${id.value}`,formData)
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
    if(e && e.target.files[0]) {
      submitData.data.image = e.target.files[0];
      let reader = new FileReader();
      reader.onload = () => {
          imageUpload.value = reader.result;
      }
      reader.readAsDataURL(submitData.data.image);
    }
  };
</script>

<style scoped>
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

.waves-effect {
  background-color: #e9e9e9;
}
</style>
