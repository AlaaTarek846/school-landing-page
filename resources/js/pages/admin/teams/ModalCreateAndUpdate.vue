<template>
    <div class="modal fade" id="area-model" tabindex="-1"
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
                      <div class="col-md-12 mb-2">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$.name.$model"
                               :class="{'is-invalid': v$.name.$error || errors[`name`],
                                     'is-valid': !v$[`name`].$invalid && !errors[`name`]}">

                        <div class="invalid-feedback">
                          <span v-if="v$[`name`].required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                          <span v-if="v$.job.maxLength.$invalid">{{ $t('validation.NameMustHaveAtLeast', { max: 200 }) }}<br /></span>
                        </div>

                        <template v-if="errors[`name`]">
                          <error-message v-for="(errorMessage, index) in errors[`name`]" :key="index">
                            {{ errorMessage }}
                          </error-message>
                        </template>
                      </div>

                      <div class="col-md-12 mb-2">
                        <label class="form-label">اسم الوظيفة </label>
                        <input type="text" class="form-control form-control-lg"  v-model="v$.job.$model"
                               :class="{'is-invalid': v$.job.$error || errors[`job`],
                                     'is-valid': !v$.job.$invalid && !errors[`job`]}">

                        <template v-if="errors[`job`]">
                          <error-message v-for="(errorMessage, index) in errors[`job`]" :key="index">
                            {{ errorMessage }}
                          </error-message>
                        </template>
                      </div>
                        <div class="col-md-12 mt-3">
                          <label class="form-label">صورة (352 * 266)</label>
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
  import {maxLength, minLength, required, numeric, requiredIf, url} from "@vuelidate/validators";
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
  const imageUpload = ref('');

  onMounted(()=>{
    languages.value = store.state.lang.languages;
  });

  function defaultData(){
    submitData.data.name = '';
    submitData.data.job = '';
    submitData.data.status = true;
    submitData.data.image = '';
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

        adminApi.get(`teams/${id.value}`)
            .then((res) => {
              loading.value = true;
              let l = res.data.data;
              submitData.data.name = l.name;
              submitData.data.job  = l.job;
              imageUpload.value = l.media;
              submitData.data.status = l.status == 1;
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
      name: '',
      job: '',
    }
  });

  const rules = computed(() => {
    return {
      name: {minLength: minLength(1),maxLength:maxLength(100),required,},
      job: { minLength: minLength(1),maxLength:maxLength(100),required, },
      image: {required: requiredIf( (value) => {
          return props.type == 'create' || !imageUpload.value;
        })
      }
    }
  });

  const v$ = useVuelidate(rules,submitData.data);

  const AddSubmit = () =>  {

      v$.value.$validate();
      errors.value = {};

      let formData = new FormData();
      formData.append('name', submitData.data.name);
      formData.append('status', submitData.data.status ? 1 : 0);
      formData.append('job', submitData.data.job);
    if(submitData.data.image) {
      formData.append('image', submitData.data.image);
    }

      if (props.type !== 'edit') {
        if (!v$.value.$error) {
          is_disabled.value = false;
          loading.value = true;
          adminApi.post(`teams`, formData)
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
        adminApi.post(`teams/${id.value}`,formData)
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
