<template>
    <div class="modal fade" id="facilities-model" tabindex="-1"
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

                      <!-- Description AR -->
                      <div class="col-md-12 mb-2">
                        <label class="form-label">{{ $t('global.description') }} (AR)</label>
                        <textarea class="form-control" rows="3" v-model="v$.description_ar.$model"
                                  :class="{'is-invalid': v$.description_ar.$error || errors[`description_ar`],
                                        'is-valid': !v$[`description_ar`].$invalid && !errors[`description_ar`]}"></textarea>
                        <div class="invalid-feedback" v-if="v$.description_ar.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                      <!-- Description EN -->
                      <div class="col-md-12 mb-2">
                        <label class="form-label">{{ $t('global.description') }} (EN)</label>
                        <textarea class="form-control" rows="3" v-model="v$.description_en.$model"
                                  :class="{'is-invalid': v$.description_en.$error || errors[`description_en`],
                                        'is-valid': !v$[`description_en`].$invalid && !errors[`description_en`]}"></textarea>
                        <div class="invalid-feedback" v-if="v$.description_en.$error">
                             {{ $t('validation.fieldRequired') }}
                        </div>
                      </div>

                      <!-- Image Upload -->
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
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-2 d-flex justify-content-between align-items-center">
                            <h6>{{ $t('global.FacilityDetails') }}</h6>
<!--                            <button type="button" class="btn btn-sm btn-success" @click.prevent="addDetail">-->
<!--                                <i class="ri-add-line"></i> {{ $t('global.add') }}-->
<!--                            </button>-->
                        </div>

                        <div class="col-md-12" v-for="(detail, index) in submitData.data.details" :key="index">
                            <div class="card border p-2 mb-2">
                                <div class="row">
<!--                                    <div class="col-md-12 text-end">-->
<!--                                        <button type="button" class="btn btn-sm btn-danger" @click.prevent="removeDetail(index)">-->
<!--                                            <i class="ri-delete-bin-line"></i>-->
<!--                                        </button>-->
<!--                                    </div>-->
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">{{ $t('global.TitleAr') }}</label>
                                        <input type="text" class="form-control" v-model="detail.title_ar">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">{{ $t('global.TitleEn') }}</label>
                                        <input type="text" class="form-control" v-model="detail.title_en">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">{{ $t('global.count') }}</label>
                                        <input type="number" class="form-control" v-model="detail.count" min="0">
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

  const props = defineProps({
      type: {default: 'create'},
      dataRow: {default: ''},
  });

  const emit = defineEmits(['created','getStatus', 'update:modelValue']);

  setTimeout(async () => {
    let myModalEl = document.getElementById('facilities-model')
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

  function defaultData(){
    submitData.data.title_ar = '';
    submitData.data.title_en = '';
    submitData.data.description_ar = '';
    submitData.data.description_en = '';
    submitData.data.image = '';
    submitData.data.details = [];
    
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
         adminApi.get(`facilities/${id.value}`)
            .then((res) => {
              let l = res.data.data;
              submitData.data.title_ar = l.title_ar;
              submitData.data.title_en = l.title_en;
              submitData.data.description_ar = l.description_ar;
              submitData.data.description_en = l.description_en;
              submitData.data.details = l.details || [];
              imageUpload.value = l.image;
            })
            .catch((err) => {
              console.log(err);
            })
            .finally(() => {
              loading.value = false;
            })
      }
    }, 200);
  }

  function resetModalHidden() {
    defaultData();
    nextTick(() => { v$.value.$reset() });
    emit('update:modelValue', false);
  }

  const submitData =  reactive({
    data:{
      title_ar: '',
      title_en: '',
      description_ar: '',
      description_en: '',
      image: '',
      details: []
    }
  });

  function addDetail() {
      submitData.data.details.push({
          title_ar: '',
          title_en: '',
          count: 0
      });
  }

  function removeDetail(index) {
      submitData.data.details.splice(index, 1);
  }

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

      submitData.data.details.forEach((detail, index) => {
          formData.append(`details[${index}][title_ar]`, detail.title_ar);
          formData.append(`details[${index}][title_en]`, detail.title_en);
          formData.append(`details[${index}][count]`, detail.count);
      });

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`facilities`, formData)
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
        adminApi.post(`facilities/${id.value}`,formData)
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
