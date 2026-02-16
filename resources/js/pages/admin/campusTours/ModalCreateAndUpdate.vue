<template>
    <div class="modal fade" id="campus-tours-model" tabindex="-1"
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

                      <!-- Category -->
                      <div class="col-md-12 mb-2">
                        <label class="form-label">{{ $t('global.CampusTourCategories') }}</label>
                        <select class="form-select" v-model="v$.campus_tour_category_id.$model"
                                :class="{'is-invalid': v$.campus_tour_category_id.$error || errors[`campus_tour_category_id`],
                                      'is-valid': !v$[`campus_tour_category_id`].$invalid && !errors[`campus_tour_category_id`]}">
                            <option value="" disabled selected>{{ $t('global.SelectCategory') }}</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.title_en }} - {{ category.title_ar }}
                            </option>
                        </select>
                         <div class="invalid-feedback" v-if="v$.campus_tour_category_id.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>
                      
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

                       <!-- Content Upload -->
                       <!-- Content Upload -->
                        <div class="col-md-12 mb-3">
                           <div class="alert alert-info py-2">
                               <small>
                                   <i class="bi bi-info-circle me-1"></i>
                                   {{ $t('global.AddOnlyOneItem') || 'Add only one item: Video, Image, or Link' }}
                               </small>
                           </div>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label class="form-label">الصورة (اختياري) (800*640)</label>
                          <div class="row img-div-position">
                            <div class="col-12 text-end">
                              <button
                                  type="button" class="btn btn-danger btn-sm"
                                  @click="imageUpload = ''; submitData.data.image = '';"
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
                                       id="photoPersonal1" accept="image/*"
                                       :disabled="!!videoPreview || !!submitData.data.link">

                                <div v-if="imageUpload" class="row justify-content-center h-100">
                                   <figure class="col-3">
                                    <img :src="imageUpload.url ? imageUpload.url : imageUpload" class="img-fluid rounded h-100 w-100 m-1" />
                                  </figure>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                         <!-- Video Upload -->
                        <div class="col-md-12 mt-3">
                          <label class="form-label">فيديو (اختياري)</label>
                          <input type="file" class="form-control" @change="handleVideoUpload" accept="video/mp4,video/x-m4v,video/*"
                                 :disabled="!!imageUpload || !!submitData.data.link">
                           <div v-if="videoPreview" class="mt-2">
                                <video width="320" height="240" controls :src="videoPreview"></video>
                                <button type="button" class="btn btn-danger btn-sm d-block mt-1" @click="clearVideo">Remove Video</button>
                           </div>
                        </div>

                        <!-- Link (if no image/video) -->
                        <div class="col-md-12 mb-2 mt-2">
                            <label class="form-label">الرابط (اختياري)</label>
                            <input type="text" class="form-control form-control-lg"  v-model="v$.link.$model"
                                   :class="{'is-invalid': v$.link.$error}"
                                   :disabled="!!imageUpload || !!videoPreview">
                             <div class="invalid-feedback" v-if="v$.link.$error">
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

  const props = defineProps({
      type: {default: 'create'},
      dataRow: {default: ''},
  });

  const emit = defineEmits(['created','getStatus']);

  setTimeout(async () => {
    let myModalEl = document.getElementById('campus-tours-model')
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
  const imageUpload = ref('');
  const videoPreview = ref('');
  const videoFile = ref(null);
  const categories = ref([]);

  function getCategories() {
      adminApi.get('campus-tour-categories') // Assuming a route exists to get all categories
        .then((res) => {
            // Adjust based on actual API response structure for 'index' or a specific 'list' endpoint
            // Usually pagination response wraps items in 'data' or 'data.data'
            // If the index endpoint returns paginated data, we might need a ?limit=-1 or similar to get all, 
            // OR use a specific 'list' endpoint if available. 
            // For now assuming existing index endpoint returns paginated data in res.data.data
            categories.value = res.data.data; 
        })
        .catch((err) => {
            console.error(err);
        });
  }

  onMounted(() => {
      getCategories();
  });

  function defaultData(){
    submitData.data.title_ar = '';
    submitData.data.title_en = '';
    submitData.data.image = '';
    submitData.data.link = '';
    submitData.data.campus_tour_category_id = '';
    
    is_disabled.value = false;
    loading.value = false;
    errors.value = [];
    imageUpload.value = '';
    videoPreview.value = '';
    videoFile.value = null;
  }

  function resetModal() {
    defaultData();
    setTimeout(async () => {
      if (props.type != 'edit') {
      } else {
        id.value = props.dataRow.id;
        
        loading.value = true;
         adminApi.get(`campus-tours/${id.value}`)
            .then((res) => {
              let l = res.data.data;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_en = l.title_en;
              submitData.data.link = l.link; 
              submitData.data.campus_tour_category_id = l.campus_tour_category_id;
              imageUpload.value = l.image;
              if (l.video) {
                  videoPreview.value = l.video; // Assuming API returns URL
              } 
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
      image: '',
      link: '',
      campus_tour_category_id: ''
    }
  });

  const rules = computed(() => {
    return {
      title_ar: {required},
      title_en: {required},
      campus_tour_category_id: {required},
      link: {} 
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {
      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('title_ar', submitData.data.title_ar);
      formData.append('title_en', submitData.data.title_en);
      formData.append('link', submitData.data.link ? submitData.data.link : '');
      formData.append('campus_tour_category_id', submitData.data.campus_tour_category_id);
      
      if(submitData.data.image && typeof submitData.data.image !== 'string') {
          formData.append('image', submitData.data.image);
      }
      if(videoFile.value) {
          formData.append('video', videoFile.value);
      }

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`campus-tours`, formData)
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
        adminApi.post(`campus-tours/${id.value}`,formData)
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

  const handleVideoUpload = (event) => {
      const file = event.target.files[0];
      if (file) {
          videoFile.value = file;
          videoPreview.value = URL.createObjectURL(file);
      }
  };

  const clearVideo = () => {
      videoFile.value = null;
      videoPreview.value = '';
      // Reset file input if needed
  };
</script>

<style scoped>
.waves-effect {
  background-color: #e9e9e9;
}
</style>
