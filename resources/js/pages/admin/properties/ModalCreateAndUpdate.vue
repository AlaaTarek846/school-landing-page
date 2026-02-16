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
            <div class="col-md-6 mt-2">
              <label class="form-label">{{ $t('global.type') }}</label>

              <Select v-model="v$.type.$model" :filterFields="['id', 'title']" :options="types" filter
                      :invalid="v$.type.$error || errors[`type`]" optionLabel="title" optionValue="id"
                      :class="['w-full w-100', { 'is-invalid': v$.type.$error || errors[`type`], 'is-valid': !v$.type.$invalid && !errors[`type`] }]">

              </Select>
              <div class="invalid-feedback">
                <span v-if="v$.type.required.$invalid">{{
                    $t('global.ThisFieldIsRequired') }}<br />
                </span>
              </div>
              <template v-if="errors['type']">
                <error-message v-for="(errorMessage, index) in errors['type']" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
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
            <div class="col-md-6">
              <label class="form-label">{{ $t('global.areas') }}</label>

              <Select v-model="v$.area_id.$model" :filterFields="['id', 'title']" :options="areas" filter
                      :invalid="v$.area_id.$error || errors[`area_id`]" optionLabel="title" optionValue="id"
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
            <div class="col-md-6">
              <label class="form-label">{{ $t('label.projects') }}</label>

              <Select v-model="v$.project_id.$model" :filterFields="['id', 'title']" :options="companies" filter
                      :invalid="v$.project_id.$error || errors[`project_id`]" optionLabel="title" optionValue="id"
                      :class="['w-full w-100', { 'is-invalid': v$.project_id.$error || errors[`project_id`], 'is-valid': !v$.project_id.$invalid && !errors[`project_id`] }]">

              </Select>
              <div class="invalid-feedback">
                <span v-if="v$.project_id.required.$invalid">{{
                    $t('global.ThisFieldIsRequired') }}<br />
                </span>
              </div>
              <template v-if="errors['project_id']">
                <error-message v-for="(errorMessage, index) in errors['project_id']" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>
            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.count') }} {{ $t('global.bathroom') }} </label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.bathroom.$model"
                  :class="{
                              'is-invalid': v$.bathroom.$error || errors['bathroom'],
                              'is-valid': !v$.bathroom.$invalid && !errors['bathroom']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.bathroom.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                <span v-if="v$.bathroom.minValue?.$invalid">
                              {{ $t('validation.CostMustBeAtLeast') }}
                              {{ v$.bathroom.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                <template v-if="errors['bathroom']">
                  <error-message
                      v-for="(errorMessage, index) in errors['bathroom']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>
            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.count') }} {{ $t('global.bedroom') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.bedroom.$model"
                  :class="{
                              'is-invalid': v$.bedroom.$error || errors['bedroom'],
                              'is-valid': !v$.bedroom.$invalid && !errors['bedroom']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.bedroom.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                <span v-if="v$.bedroom.minValue?.$invalid">
                              {{ $t('validation.CostMustBeAtLeast') }}
                              {{ v$.bedroom.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                <template v-if="errors['bedroom']">
                  <error-message
                      v-for="(errorMessage, index) in errors['bedroom']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>
            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.count') }} {{ $t('global.living_room') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.living_room.$model"
                  :class="{
                              'is-invalid': v$.living_room.$error || errors['living_room'],
                              'is-valid': !v$.living_room.$invalid && !errors['living_room']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.living_room.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                <span v-if="v$.living_room.minValue?.$invalid">
                              {{ $t('validation.CostMustBeAtLeast') }}
                              {{ v$.living_room.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                <template v-if="errors['living_room']">
                  <error-message
                      v-for="(errorMessage, index) in errors['living_room']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>
            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.count') }} {{ $t('global.kitchen') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.kitchen.$model"
                  :class="{
                              'is-invalid': v$.kitchen.$error || errors['kitchen'],
                              'is-valid': !v$.kitchen.$invalid && !errors['kitchen']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.kitchen.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                <span v-if="v$.kitchen.minValue?.$invalid">
                              {{ $t('validation.CostMustBeAtLeast') }}
                              {{ v$.kitchen.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                <template v-if="errors['kitchen']">
                  <error-message
                      v-for="(errorMessage, index) in errors['kitchen']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>

            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.count') }} {{ $t('global.garden') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.garden.$model"
                  :class="{
                              'is-invalid': v$.garden.$error || errors['garden'],
                              'is-valid': !v$.garden.$invalid && !errors['garden']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.garden.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                <span v-if="v$.garden.minValue?.$invalid">
                              {{ $t('validation.CostMustBeAtLeast') }}
                              {{ v$.garden.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                <template v-if="errors['garden']">
                  <error-message
                      v-for="(errorMessage, index) in errors['garden']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>
            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.count') }} {{ $t('global.parking') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.parking.$model"
                  :class="{
                              'is-invalid': v$.parking.$error || errors['parking'],
                              'is-valid': !v$.parking.$invalid && !errors['parking']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.parking.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>

                <span v-if="v$.parking.minValue?.$invalid">
                              {{ $t('validation.CostMustBeAtLeast') }}
                              {{ v$.parking.minValue.$params.min }}
                              {{ $t('validation.Value') }}<br />
                            </span>

                <template v-if="errors['parking']">
                  <error-message
                      v-for="(errorMessage, index) in errors['parking']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>
            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.floor') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.floor.$model"
                  :class="{
                              'is-invalid': v$.floor.$error || errors['floor'],
                              'is-valid': !v$.floor.$invalid && !errors['floor']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.floor.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>



                <template v-if="errors['floor']">
                  <error-message
                      v-for="(errorMessage, index) in errors['floor']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
            </div>

            <div class="col-md-3 mb-2">
              <label class="form-label">{{ $t('global.number_house') }}</label>

              <input
                  type="number"
                  class="form-control form-control-lg"
                  v-model="v$.number_house.$model"
                  :class="{
                              'is-invalid': v$.number_house.$error || errors['number_house'],
                              'is-valid': !v$.number_house.$invalid && !errors['number_house']
                            }"
              />

              <div class="invalid-feedback">
                            <span v-if="v$.number_house.required.$invalid">
                              {{ $t('validation.fieldRequired') }}<br />
                            </span>


                <template v-if="errors['number_house']">
                  <error-message
                      v-for="(errorMessage, index) in errors['number_house']"
                      :key="index"
                  >
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
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


            <div class="col-md-6 mt-3">
              <label class="form-label">صورة الخلفية (800 * 790)</label>
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
            <div class="col-md-6 mt-3">
              <label class="form-label"> {{ $t('global.pdf') }}</label>
              <div class="row img-div-position">
                <div class="col-12 text-end">
                  <button
                      type="button" class="btn btn-danger btn-sm"
                      @click="pdfUpload = ''"
                      v-if="pdfUpload"
                  >
                    {{ $t('global.deleteImage') }}
                  </button>
                </div>
                <div class="col-md-12 mt-3 d-flex flex-wrap flex-fill h-100">
                  <div class="btn btn-outline-light waves-effect" style="width: 100%; height:90%">

                                    <span v-if="!pdfUpload && !submitData.data.pdf" style="margin-top:35%;">
                                        <br><i class="bi bi-cloud-upload fs-40" style="font-size: 85px;"></i>
                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                    </span>

                    <input name="mediaPackageUpload" type="file" @change="previewpdf"
                           id="photoPersonal1" accept="pdf/*">

                    <div id="container-pdf" class="row justify-content-center h-100"></div>

                    <div v-if="pdfUpload && !submitData.data.pdf" class="row justify-content-center h-100">
                      <figure class="col-3" v-if="!pdfUpload.mime_type.includes('application/pdf')">
                        <img :src="pdfUpload.url" class="img-fluid rounded h-100 w-100 m-1" />
                      </figure>
                      <figure class="col-3" v-else>
                        <img src="/assets/images/pdf.png" class="img-fluid rounded h-100 w-100 m-1" />
                      </figure>
                    </div>

                    <div class="col-md-12 my-1" v-if="v$.pdf.$error">
                      <span class="text-danger" v-if="v$.pdf.required.$invalid">{{ $t('validation.fieldRequired') }}<br /></span>
                    </div>
                    <template v-if="errors['pdf']">
                      <error-message v-for="(errorMessage, index) in errors['pdf']" :key="index">
                        {{ errorMessage }}
                      </error-message>
                    </template>

                  </div>

                </div>
              </div>
            </div>
            <div :class="['col-md-12', type != 'edit'?'mt-5':'mt-5']">
              <label class="form-label">تحميل صور للعقار</label>
              <div class="row mt-1" v-if="type == 'edit'">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 position-relative" v-for="(photo,i) in vehicle_photo" :key="photo.id">
                  <span class="text-center position-absolute delete-media" @click.prevent="deleteMedia(photo.id,i)">x</span>
                  <a :href="photo.url" target="_blank" class="glightbox card" data-gallery="gallery1">
                    <img width="150" height="150"  :src="photo.url" alt="image" >
                  </a>
                </div>
              </div>
              <div class="row img-div-position">
                <div class="col-md-12 mt-3 d-flex flex-wrap flex-fill h-100">
                  <div class="btn btn-outline-light waves-effect" style="width: 100%; height:90%">

                                        <span v-if="!numberOfImageUpload1" style="margin-top:35%;">
                                            <br><i class="bi bi-cloud-upload fs-40" style="font-size: 85px;"></i>
                                            <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                        </span>

                    <input name="mediaPackageUpload" multiple type="file" @change="previewGroup1"
                           id="mediaPackageUpload1" accept="image/*">

                    <div id="container-images-group-add1" class="row h-100"></div>

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
const areas = ref([]);
const companies = ref([]);
const vehicle_photo = ref([]);
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
  dataProjectCategories: {default: () => []},
});

let getAreas = (id) => {
  loading.value = true;
  adminApi.get(`areas-dropdown`)
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

let getCompanies = (id) => {
  loading.value = true;
  adminApi.get(`projects-dropdown`)
      .then((res) => {
        let l = res.data.data;
        companies.value = l;
      })
      .catch((err) => {
        console.log(err.response.data);
      })
      .finally(() => {
        loading.value = false;
      })
}

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
const cities = ref([]);
const langValidation = ref({});
let loading = ref(false);
let is_disabled = ref(false);
const { t } = useI18n({});
const store = useStore();
const id = ref(null);
const imageUpload = ref('');
const pdfUpload = ref('');

onMounted(()=>{
  getCompanies();
  getAreas();
});

function defaultData(){
  numberOfImageUpload1.value = 0;
  submitData.data.vehicle_photo = [];
  submitData.data.image = '';
  submitData.data.pdf = '';
  submitData.data.title_en = '';
  submitData.data.title_ar = '';
  submitData.data.description_en = '';
  submitData.data.description_ar = '';
  submitData.data.garden = '';
  submitData.data.living_room = '';
  submitData.data.bedroom = '';
  submitData.data.floor = '';
  submitData.data.parking = '';
  submitData.data.bathroom = '';
  submitData.data.number_house = '';
  submitData.data.kitchen = '';
  submitData.data.type = '';
  submitData.data.project_id = '';
  submitData.data.area_id = '';
  submitData.data.status = true;
  submitData.data.image = '';
  vehicle_photo.value = [];
  is_disabled.value = false;
  loading.value = false;
  errors.value = [];
  imageUpload.value = '';
  pdfUpload.value = '';

  let i = document.querySelector('#container-images');
  if(i) { i.innerHTML = ''; }
  let j = document.querySelector('#container-pdf');
  if(j) { j.innerHTML = ''; }
  document.querySelector('#container-images-group-add1').innerHTML = '';
}
function resetModal() {
  defaultData();
  setTimeout(async () => {
    if (props.type != 'edit') {
    } else {
      id.value = props.dataRow.id;

      adminApi.get(`properties/${id.value}`)
          .then((res) => {
            loading.value = true;
            let l = res.data.data;
            imageUpload.value = l.photo;
            pdfUpload.value = l.pdf;
            submitData.data.title_en = l.title_en;
            submitData.data.title_ar = l.title_ar;
            submitData.data.description_en = l.description_en;
            submitData.data.description_ar = l.description_ar;
            submitData.data.type = l.type;
            submitData.data.garden = l.garden;
            submitData.data.bedroom = l.bedroom;
            submitData.data.floor = l.floor;
            submitData.data.parking = l.parking;
            submitData.data.bathroom = l.bathroom;
            submitData.data.number_house = l.number_house;
            submitData.data.kitchen = l.kitchen;
            submitData.data.living_room = l.living_room;
            submitData.data.project_id = l.project_id;
            submitData.data.area_id = l.area_id;
            submitData.data.status = l.status == 1;
            vehicle_photo.value = l.images ?? [];
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
    pdf: '',
    title_en: '',
    title_ar: '',
    description_en: '',
    description_ar: '',
    project_id: '',
    living_room: '',
    bathroom: '',
    number_house: '',
    parking: '',
    floor: '',
    garden: '',
    kitchen: '',
    bedroom: '',
    type: '',
    area_id: '',
    vehicle_photo: [],
  }
});

const types = ref([
  { id: 'villa', title: 'فيلا' },
  { id: 'apartment', title:'شقة'  },
]);

const rules = computed(() => {
  return {
    ...langValidation.value,
    image: {required: requiredIf( (value) => {
        return props.type == 'create' || !imageUpload.value;
      })
    },
    vehicle_photo:{
      required: requiredIf( (value) => {
        return props.type == 'create' || !vehicle_photo.value;
        })
    },
    title_en: {required,minLength: minLength(5),maxLength: maxLength(191)},
    title_ar: {required,minLength: minLength(5),maxLength: maxLength(191)},
    description_en: {required,minLength: minLength(5)},
    description_ar: {required,minLength: minLength(5)},
    area_id: {required},
    project_id: {required},
    type: {required},
    bathroom: {required,integer,between: (value) => {
        if(value === undefined || value === null || value === '') return true;
        return value >= 1 && value <= 10;
      }},
    bedroom: {required,integer,between: (value) => {
        if(value === undefined || value === null || value === '') return true;
        return value >= 1 && value <= 10;
      }},
    living_room: {required,integer,between: (value) => {
        if(value === undefined || value === null || value === '') return true;
        return value >= 1 && value <= 10;
      }},
    kitchen: {required,integer,between: (value) => {
        if(value === undefined || value === null || value === '') return true;
        return value >= 1 && value <= 10;
      }},
    garden: {required,integer,between: (value) => {
        if(value === undefined || value === null || value === '') return true;
        return value >= 1 && value <= 10;
      }},
    floor: {required,integer},
    parking: {required,integer,between: (value) => {
        if(value === undefined || value === null || value === '') return true;
        return value >= 1 && value <= 10;
      }},
    number_house: {required,integer},
    pdf: {required: requiredIf( (value) => {
        return props.type == 'create' || !pdfUpload.value;
      })
    },
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
  formData.append('description_en', submitData.data.description_en);
  formData.append('description_ar', submitData.data.description_ar);
  formData.append('area_id', submitData.data.area_id);
  formData.append('project_id', submitData.data.project_id);
  formData.append('type', submitData.data.type);
  formData.append('bathroom', submitData.data.bathroom);
  formData.append('bedroom', submitData.data.bedroom);
  formData.append('living_room', submitData.data.living_room);
  formData.append('kitchen', submitData.data.kitchen);
  formData.append('garden', submitData.data.kitchen);
  formData.append('floor', submitData.data.floor);
  formData.append('parking', submitData.data.parking);
  formData.append('number_house', submitData.data.number_house);

  if(submitData.data.image) {
    formData.append('photo', submitData.data.image);
  }
  if(submitData.data.pdf) {
    formData.append('pdf', submitData.data.pdf);
  }
  if(submitData.data.vehicle_photo.length > 0) {
    submitData.data.vehicle_photo.forEach((el, key)=>{
      formData.append(`images[${key}]`, el);
    });
  }

  console.log(props.type);

  if (props.type !== 'edit') {
    if (!v$.value.$error) {
      is_disabled.value = false;
      loading.value = true;
      adminApi.post(`properties`, formData)
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
    adminApi.post(`properties/${id.value}`,formData)
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
const previewpdf = (e) => {
  let containerImages = document.querySelector("#container-pdf");
  containerImages.innerHTML = "";

  if (e) {
    submitData.data.pdf = {};
    submitData.data.pdf = e.target.files[0];
    if (submitData.data.pdf.type.includes('application/pdf')) {
      let figure = document.createElement('figure');
      figure.className = 'col-3';
      let img = document.createElement('img');
      img.className = 'img-fluid rounded h-100 w-100 m-1';
      img.setAttribute('src', '/assets/images/pdf.png');
      figure.appendChild(img);
      containerImages.appendChild(figure);
    }
  }

};

const numberOfImageUpload1 = ref(0);
let previewGroup1 = (e) => {
  let containerImages = document.querySelector('#container-images-group-add1');
  containerImages.innerHTML = '';
  submitData.data.vehicle_photo = [];

  numberOfImageUpload1.value = e.target.files.length;

  Array.from(e.target.files).forEach((file) => {
    submitData.data.vehicle_photo.push(file);

    let reader = new FileReader();
    let figure = document.createElement('figure');
    figure.className = 'col';


    reader.onload = () => {
      let img = document.createElement('img');
      img.className = 'img-fluid rounded h-100 w-100 m-1';
      img.setAttribute('src', reader.result);
      figure.appendChild(img);

    }

    containerImages.appendChild(figure);
    reader.readAsDataURL(file);
  });
};
let deleteMedia = (id,index) => {
  Swal.fire({
    title: `${t('global.AreYouSureDelete')}`,
    text: `${t("global.YouWontBeAbleToRevertThis")}`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: t('global.yes'),
    cancelButtonText: t('global.no'),
  }).then((result) => {
    if (result.isConfirmed) {
      adminApi.delete(`properties/media/${id}`)
          .then((res) => {
            vehicle_photo.value.splice(index,1);
            Swal.fire({
              icon: 'success',
              title: `${t('global.DeletedSuccessfully')}`,
              showConfirmButton: false,
              timer: 1500
            });
          })
          .catch((err) => {
            Swal.fire({
              icon: 'error',
              title: `${t('global.ThereIsAnErrorInTheSystem')}`,
              text: `${t('global.YouCanNotDelete')}`,
            });
          });
    }
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
.delete-media {
  height: 25px;
  z-index: 100;
  width: 29px;
  line-height: 25px;
  font-weight: 600;
  cursor: pointer;
  color: rgb(var(--danger-rgb));
  background-color: #d5cece;
}

.delete-media:hover {
  color: #d5cece !important;
  background-color: #f00f08;
}
</style>
