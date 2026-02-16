<template>
  <div class="modal fade" id="area-model" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLgLabel">
            {{ type == 'create' ? $t('global.add') : $t('global.update') }}
          </h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Main Content Area with Tabs -->
            <div class="col-lg-8">
              <!-- Tabs Navigation -->
              <ul class="nav nav-tabs" id="articleTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">
                    <i class="bi bi-info-circle me-1"></i>المقال
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab" aria-controls="seo" aria-selected="false">
                    <i class="bi bi-search me-1"></i>SEO
                  </button>
                </li>
              </ul>

              <!-- Tabs Content -->
              <div class="tab-content mt-4" id="articleTabsContent">
                <!-- Basic Information Tab -->
                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
          <div class="row">
                    <!-- Basic Information -->
                    <div class="col-md-6 mb-3">
              <label class="form-label">{{ $t('label.title') }} ( عربي )</label>
              <input type="text" class="form-control form-control-lg" v-model="v$.title_ar.$model" :class="{
                'is-invalid': v$.title_ar.$error || errors[`title_ar`],
                'is-valid': !v$.title_ar.$invalid && !errors[`title_ar`]
              }">

              <div class="invalid-feedback">
                <span v-if="v$.title_ar.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                <span v-if="v$.title_ar.minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                    v$.title_ar.minLength.$params.min
                  }} {{ $t('validation.Letters') }} <br />
                </span>
                <span v-if="v$.title_ar.maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                    v$.title_ar.maxLength.$params.max
                  }} {{ $t('validation.Letters') }}
                </span>
              </div>
              <template v-if="errors[`title_ar`]">
                <error-message v-for="(errorMessage, index) in errors[`title_ar`]" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>
                    <div class="col-md-6 mb-3">
              <label class="form-label">{{ $t('label.title') }} ( English )</label>
              <input type="text" class="form-control form-control-lg" v-model="v$.title_en.$model" :class="{
                'is-invalid': v$.title_en.$error || errors[`title_en`],
                'is-valid': !v$.title_en.$invalid && !errors[`title_en`]
              }">

              <div class="invalid-feedback">
                <span v-if="v$.title_en.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                <span v-if="v$.title_en.minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                    v$.title_en.minLength.$params.min
                  }} {{ $t('validation.Letters') }} <br />
                </span>
                <span v-if="v$.title_en.maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                    v$.title_en.maxLength.$params.max
                  }} {{ $t('validation.Letters') }}
                </span>
              </div>
              <template v-if="errors[`title_en`]">
                <error-message v-for="(errorMessage, index) in errors[`title_en`]" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">{{ $t('global.details') }} ( عربي )</label>
                      <Editor ref="descRef" v-model="v$.content_ar.$model"></Editor>
                      <div class="invalid-feedback">
                        <span v-if="v$.content_ar.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                      </div>

                      <template v-if="errors[`content_ar`]">
                        <error-message v-for="(errorMessage, index) in errors[`content_ar`]" :key="index">
                          {{ errorMessage }}
                        </error-message>
                      </template>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">{{ $t('global.details') }} ( English )</label>
                      <Editor ref="descRef" v-model="v$.content_en.$model"></Editor>
                      <div class="invalid-feedback">
                        <span v-if="v$.content_en.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
              </div>

                      <template v-if="errors[`content_en`]">
                        <error-message v-for="(errorMessage, index) in errors[`content_en`]" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>

                    <div class="col-md-6 mb-3">
              <label class="form-label">{{ $t('global.selectCategory') }}</label>
              <Select v-model="v$.category_id.$model" :filterFields="['id', 'title']" :options="categories" filter
                      :invalid="v$.category_id.$error || errors[`category_id`]" optionLabel="title" optionValue="id"
                      :class="['w-full w-100', { 'is-invalid': v$.category_id.$error || errors[`category_id`], 'is-valid': !v$.category_id.$invalid && !errors[`category_id`] }]">

              </Select>
              <div class="invalid-feedback">
                        <span v-if="v$.category_id.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
              </div>

                      <template v-if="errors[`category_id`]">
                        <error-message v-for="(errorMessage, index) in errors[`category_id`]" :key="index">
                  {{ errorMessage }}
                </error-message>
              </template>
            </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">{{ $t('label.status') }}</label>
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


                    <!-- Image Upload -->
            <div class="col-md-12 mt-3">
                      <label class="form-label">{{ $t('label.image') }} (Featured Image) (1920 * 900)</label>
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

                <!-- SEO Fields Tab -->
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Focus keyphrase</label>
                      <input type="text" class="form-control form-control-lg" v-model="submitData.data.focus_keyphrase" :class="{
                        'is-invalid': errors['focus_keyphrase'],
                        'is-valid': !errors['focus_keyphrase'] && submitData.data.focus_keyphrase
                      }" placeholder="أدخل الكلمة المفتاحية الأساسية">
                      <small class="text-muted">الكلمة المفتاحية التي تريد التركيز عليها في المقال</small>
                      <template v-if="errors['focus_keyphrase']">
                        <error-message v-for="(errorMessage, index) in errors['focus_keyphrase']" :key="index">
                          {{ errorMessage }}
                        </error-message>
                      </template>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">SEO Title</label>
                      <input type="text" class="form-control form-control-lg" v-model="submitData.data.seo_title" :class="{
                        'is-invalid': errors['seo_title'],
                        'is-valid': !errors['seo_title'] && submitData.data.seo_title
                      }" placeholder="عنوان SEO جذاب">
                      <small class="text-muted">{{ submitData.data.seo_title.length }}/60 حرف</small>
                      <template v-if="errors['seo_title']">
                        <error-message v-for="(errorMessage, index) in errors['seo_title']" :key="index">
                          {{ errorMessage }}
                        </error-message>
                      </template>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">Meta Description</label>
                      <textarea
                          class="form-control form-control-lg"
                          rows="3"
                          v-model="submitData.data.meta_description"
                          :class="{'is-invalid': errors['meta_description'],
                                  'is-valid':!errors['meta_description'] && submitData.data.meta_description}"
                          placeholder="وصف جذاب للمقال يظهر في نتائج البحث">
                      </textarea>
                      <small class="text-muted">{{ submitData.data.meta_description.length }}/160 حرف</small>
                      <template v-if="errors['meta_description']">
                        <error-message v-for="(errorMessage, index) in errors['meta_description']" :key="index">
                          {{ errorMessage }}
                        </error-message>
                      </template>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">Tags</label>
                      <Chips v-model="submitData.data.tags" :class="{
                        'is-invalid': errors['tags'],
                        'is-valid': !errors['tags'] && submitData.data.tags?.length
                      }"/>
                      <div class="mt-1">
                        <small class="text-muted">{{ $t('global.pressEnterToAddTag') }}</small>
                      </div>
                      <template v-if="errors['tags']">
                        <error-message v-for="(errorMessage, index) in errors['tags']" :key="index">
                          {{ errorMessage }}
                        </error-message>
                      </template>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">Synonyms keyphrase</label>
                      <input type="text" class="form-control form-control-lg" v-model="submitData.data.synonyms_keyphrase" :class="{
                        'is-invalid': errors['synonyms_keyphrase'],
                        'is-valid': !errors['synonyms_keyphrase'] && submitData.data.synonyms_keyphrase
                      }" placeholder="مرادف1, مرادف2, مرادف3">
                      <small class="text-muted">مرادفات الكلمة المفتاحية مفصولة بفواصل</small>
                      <template v-if="errors['synonyms_keyphrase']">
                        <error-message v-for="(errorMessage, index) in errors['synonyms_keyphrase']" :key="index">
                          {{ errorMessage }}
                        </error-message>
                      </template>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label">Permalink</label>
                      <input type="text" class="form-control form-control-lg bg-light" :value="generatePermalink()" readonly>
                      <small class="text-muted">الرابط النهائي للمقال (يُولد تلقائياً)</small>
                    </div>

                    
                  </div>
                </div>
              </div>
            </div>

            <!-- SEO Analysis Sidebar -->
            <div class="col-lg-4">
              <div class="seo-sidebar sticky-top">
                <div class="card border-0 shadow-sm">
                  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">
                      <i class="bi bi-bar-chart-line me-2"></i>
                      تحليل SEO
                    </h6>
                    <div class="seo-score-badge" v-if="seoAnalysis.overall_score">
                      {{ seoAnalysis.overall_score.grade }} ({{ seoAnalysis.overall_score.score }}%)
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Overall Score Circle -->
                    <div v-if="seoAnalysis.overall_score" class="text-center mb-4">
                      <div class="seo-score-circle" :class="getScoreClass(seoAnalysis.overall_score.score)">
                        <span class="seo-score-text">{{ seoAnalysis.overall_score.score }}%</span>
                      </div>
                      <p class="mb-0 mt-2 text-muted small">
                        <span class="text-success">{{ seoAnalysis.overall_score.summary.pass }} ممتاز</span> •
                        <span class="text-warning">{{ seoAnalysis.overall_score.summary.warning }} تحسين</span> •
                        <span class="text-danger">{{ seoAnalysis.overall_score.summary.fail }} ضعيف</span>
                      </p>
                    </div>

                    <!-- SEO Analysis Items -->
                    <div class="seo-analysis-items" v-if="seoAnalysis.results">
                      <div v-for="(result, key) in seoAnalysis.results" :key="key"
                           class="seo-item mb-3 p-3 rounded"
                           :class="getItemClass(result.status)">
                        <div class="d-flex align-items-start">
                          <div class="seo-status-icon me-3"
                               :class="getStatusIconClass(result.status)">
                            <i :class="getStatusIcon(result.status)"></i>
                          </div>
                          <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                              <strong class="text-sm">{{ getCheckTitle(key) }}</strong>
                              <small :class="getBadgeClass(result.status)">
                                {{ getStatusText(result.status) }}
                              </small>
                            </div>
                            <small class="text-muted d-block">
                              {{ result.message }}
                            </small>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Empty State -->
                    <div v-else class="text-center text-muted py-4">
                      <i class="bi bi-graph-up fa-3x mb-3 text-muted"></i>
                      <p class="mb-0">ابدأ في كتابة المحتوى لرؤية تحليل SEO</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button v-if="type != 'edit'" :disabled="!is_disabled" @click.prevent="resetModal" type="button"
                  class="btn btn-secondary">{{ $t('global.AddNewRecord') }}</button>
          <template v-if="!is_disabled">
            <button type="submit" v-if="!loading" @click.prevent="AddSubmit" class="btn btn-primary">{{
                $t('global.Submit') }}</button>

            <button class="btn btn-primary btn-loader" v-else>
              <span class="me-2">{{ $t('global.Loading') }}</span>
              <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
            </button>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, onMounted, reactive, ref, toRefs, watch, nextTick, defineEmits, defineComponent } from "vue";
import { useI18n } from "vue-i18n";
import { maxLength, minLength, required, numeric, requiredIf } from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import adminApi from "../../../api/adminAxios";
import { useStore } from "vuex";
import Editor from 'primevue/editor';

// SEO Analysis functions
function getScoreClass(score) {
  if (score >= 80) return 'seo-excellent';
  if (score >= 60) return 'seo-good';
  return 'seo-poor';
}

function getItemClass(status) {
  switch(status) {
    case 'pass': return 'seo-item-success';
    case 'warning': return 'seo-item-warning';
    case 'fail': return 'seo-item-danger';
    default: return '';
  }
}

function getStatusIconClass(status) {
  switch(status) {
    case 'pass': return 'seo-icon-success';
    case 'warning': return 'seo-icon-warning';
    case 'fail': return 'seo-icon-danger';
    default: return 'seo-icon-default';
  }
}

function getStatusIcon(status) {
  switch(status) {
    case 'pass': return 'bi bi-check-circle-fill';
    case 'warning': return 'bi bi-exclamation-triangle-fill';
    case 'fail': return 'bi bi-x-circle-fill';
    default: return 'bi bi-question-circle-fill';
  }
}

function getBadgeClass(status) {
  switch(status) {
    case 'pass': return 'badge bg-success';
    case 'warning': return 'badge bg-warning';
    case 'fail': return 'badge bg-danger';
    default: return 'badge bg-secondary';
  }
}

function getStatusText(status) {
  switch(status) {
    case 'pass': return 'ممتاز';
    case 'warning': return 'تحسين';
    case 'fail': return 'ضعيف';
    default: return 'غير محدد';
  }
}

function getCheckTitle(key) {
  const titles = {
    focus_keyphrase_in_title: 'الكلمة المفتاحية في العنوان',
    focus_keyphrase_in_slug: 'الكلمة المفتاحية في الرابط',
    focus_keyphrase_in_meta: 'الكلمة المفتاحية في الوصف',
    focus_keyphrase_in_content: 'الكلمة المفتاحية في المحتوى',
    keyphrase_density: 'كثافة الكلمة المفتاحية',
    seo_title_length: 'طول عنوان SEO',
    meta_description_length: 'طول الوصف المحسن',
    featured_image: 'الصورة المميزة',
    tags: 'الوسوم',
    category: 'الفئة',
    synonyms_in_content: 'المرادفات في المحتوى'
  };
  return titles[key] || key;
}

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
  type: { default: 'create' },
  dataRow: { default: '' },
});


const emit = defineEmits(['created', 'getStatus']);

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
const categories = ref([]);
const langValidation = ref({});
let loading = ref(false);
let is_disabled = ref(false);
const seoAnalysis = ref({});
const { t } = useI18n({});
const store = useStore();
const id = ref(null);
const imageUpload = ref('');



onMounted(() => {
  languages.value = store.state.lang.languages;
  getCategories();
});

// Watchers for SEO analysis will be declared after submitData

// Functions will be declared after submitData

function defaultData() {
  submitData.data.title_ar = "";
  submitData.data.title_en = "";
  submitData.data.content_ar = "";
  submitData.data.content_en = "";
  submitData.data.category_id = null;
  submitData.data.image = '';
  submitData.data.focus_keyphrase = '';
  submitData.data.seo_title = '';
  submitData.data.meta_description = '';
  submitData.data.tags = [];
  submitData.data.synonyms_keyphrase = '';
  is_disabled.value = false;
  loading.value = false;
  errors.value = [];
  imageUpload.value = '';
  seoAnalysis.value = {};
  let i = document.querySelector('#container-images');
  if (i) { i.innerHTML = ''; }
}

let getCategories = (id) => {
  loading.value = true;
  adminApi.get(`articles/categories`)
      .then((res) => {
        let l = res.data.data;
        categories.value = l;
      })
      .catch((err) => {
        console.log(err.response.data);
      })
      .finally(() => {
        loading.value = false;
      })
}
function resetModal() {
  defaultData();
  setTimeout(async () => {
    if (props.type != 'edit') {
    } else {
      id.value = props.dataRow.id;

      adminApi.get(`articles/${id.value}`)
          .then((res) => {
            loading.value = true;
            let l = res.data.data;
            submitData.data.title_ar = l.title_ar;
            submitData.data.title_en = l.title_en;
            submitData.data.content_ar = l.content_ar;
            submitData.data.content_en = l.content_en;
            imageUpload.value = l.media;
            submitData.data.status = l.status == 1;
            submitData.data.category_id = l.category_id;
            submitData.data.focus_keyphrase = l.focus_keyphrase || '';
            submitData.data.seo_title = l.seo_title || '';
            submitData.data.meta_description = l.meta_description || '';
            submitData.data.tags = l.tags || [];
            submitData.data.synonyms_keyphrase = l.synonyms_keyphrase || '';
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
const submitData = reactive({
  data: {
    title_en: "",
    title_ar: "",
    content_en: "",
    content_ar: "",
    image: "",
    category_id: null,
    status: 1,
    focus_keyphrase: '',
    seo_title: '',
    meta_description: '',
    tags: [],
    synonyms_keyphrase: '',
  }
});

// Watchers for SEO analysis
let seoAnalysisTimeout = null;

// Watch all data changes
watch(() => submitData.data, () => {
  // Debounce the analysis to avoid too many API calls
  clearTimeout(seoAnalysisTimeout);
  seoAnalysisTimeout = setTimeout(() => {
    performSeoAnalysis();
  }, 500); // 500ms delay
}, { deep: true });

// Specific watcher for focus_keyphrase
watch(() => submitData.data.focus_keyphrase, (newVal, oldVal) => {
  if (newVal !== oldVal) {
    console.log('Focus keyphrase changed:', newVal);
    clearTimeout(seoAnalysisTimeout);
    seoAnalysisTimeout = setTimeout(() => {
      performSeoAnalysis();
    }, 300); // Shorter delay for focus keyphrase
  }
});

watch(() => imageUpload.value, () => {
  clearTimeout(seoAnalysisTimeout);
  seoAnalysisTimeout = setTimeout(() => {
    performSeoAnalysis();
  }, 500);
});

function performSeoAnalysis() {
  const hasContent = submitData.data.title_en || submitData.data.content_en ||
                     submitData.data.seo_title || submitData.data.focus_keyphrase ||
                     submitData.data.meta_description;

  if (!hasContent) {
    seoAnalysis.value = {};
    return;
  }

  const normalizeString = (value) => {
    if (typeof value === 'string') {
      return value;
    }
    if (value === null || value === undefined) {
      return '';
    }
    return String(value);
  };

  const normalizeTags = () => {
    if (!Array.isArray(submitData.data.tags)) {
      return [];
    }
    return submitData.data.tags.filter((tag) => !!tag).map((tag) => normalizeString(tag));
  };

  const resolveImageReference = () => {
    if (submitData.data.image instanceof File) {
      return 'uploaded';
    }
    if (imageUpload.value && typeof imageUpload.value === 'object') {
      return imageUpload.value.url || imageUpload.value.path || 'existing';
    }
    return '';
  };

  const analysisPayload = {
    title_ar: normalizeString(submitData.data.title_ar),
    title_en: normalizeString(submitData.data.title_en),
    content_ar: normalizeString(submitData.data.content_ar),
    content_en: normalizeString(submitData.data.content_en),
    seo_title: normalizeString(submitData.data.seo_title),
    slug: '',
    meta_description: normalizeString(submitData.data.meta_description),
    focus_keyphrase: normalizeString(submitData.data.focus_keyphrase),
    synonyms_keyphrase: normalizeString(submitData.data.synonyms_keyphrase),
    category_id: submitData.data.category_id ?? null,
    tags: normalizeTags(),
    image: resolveImageReference()
  };

  adminApi.post('articles/analyze-seo', analysisPayload)
      .then((res) => {
        seoAnalysis.value = res.data.data;
      })
      .catch((err) => {
        console.error('SEO Analysis error:', err.response?.data?.errors || err.message);
      });
}

function generatePermalink() {
  if (!submitData.data.seo_title && !submitData.data.title_en) return '';

  const base = submitData.data.seo_title || submitData.data.title_en;
  return `${window.location.origin}/articles/${base.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '')}`;
}

const rules = computed(() => {
  return {
    title_en: { required, minLength: minLength(2), maxLength: maxLength(100) },
    title_ar: { required, minLength: minLength(2), maxLength: maxLength(100) },
    content_en: { required },
    content_ar: { required },
    category_id: { required },
    image: {
      required: requiredIf((value) => {
        return props.type == 'create' || !imageUpload.value;
      })
    }
  }
});

const v$ = useVuelidate(rules, submitData.data);



const AddSubmit = () => {

  v$.value.$validate();
  errors.value = {};

  let formData = new FormData();
  formData.append(`title_en`, submitData.data.title_en);
  formData.append(`title_ar`, submitData.data.title_ar);
  formData.append(`content_en`, submitData.data.content_en);
  formData.append(`content_ar`, submitData.data.content_ar);
  formData.append(`category_id`, submitData.data.category_id);
  formData.append('status', submitData.data.status ? 1 : 0);
  formData.append('focus_keyphrase', submitData.data.focus_keyphrase);
  formData.append('seo_title', submitData.data.seo_title);
  formData.append('meta_description', submitData.data.meta_description);
  submitData.data.tags.forEach((tag, index) => {
      formData.append(`tags[${index}]`, tag);
  });
  formData.append('synonyms_keyphrase', submitData.data.synonyms_keyphrase);
  if (submitData.data.image) {
    formData.append('image', submitData.data.image);
  }
  if (props.type !== 'edit') {
    if (!v$.value.$error) {
      is_disabled.value = false;
      loading.value = true;
      adminApi.post(`articles`, formData)
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
  } else if (!v$.value.$error) {
    is_disabled.value = false;
    loading.value = true;
    formData.append('_method', 'PUT');
    adminApi.post(`articles/${id.value}`, formData)
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
/* Modal Fullscreen */
.modal-fullscreen .modal-dialog {
  width: 100vw;
  max-width: none;
  height: 100vh;
  margin: 0;
}

.modal-fullscreen .modal-content {
  height: 100vh;
  border: none;
  border-radius: 0;
}

.modal-fullscreen .modal-body {
  height: calc(100vh - 140px);
  overflow-y: auto;
}

/* SEO Sidebar */
.seo-sidebar {
  max-height: 80vh;
  overflow-y: auto;
}

.seo-sidebar .card {
  border: none;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.seo-score-badge {
  background: rgba(255,255,255,0.2);
  padding: 2px 8px;
  border-radius: 12px;
  font-size: 0.75rem;
  font-weight: 600;
}

.seo-score-circle {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
  font-weight: bold;
  color: white;
  position: relative;
}

.seo-excellent {
  background: linear-gradient(45deg, #28a745, #20c997);
}

.seo-good {
  background: linear-gradient(45deg, #ffc107, #fd7e14);
}

.seo-poor {
  background: linear-gradient(45deg, #dc3545, #e83e8c);
}

.seo-score-text {
  font-size: 20px;
  font-weight: bold;
}

.seo-analysis-items {
  max-height: 400px;
  overflow-y: auto;
}

.seo-item {
  border-radius: 8px;
  transition: all 0.2s ease;
  border: 1px solid transparent;
}

.seo-item-success {
  background-color: rgba(40, 167, 69, 0.1);
  border-color: rgba(40, 167, 69, 0.3);
}

.seo-item-warning {
  background-color: rgba(255, 193, 7, 0.1);
  border-color: rgba(255, 193, 7, 0.3);
}

.seo-item-danger {
  background-color: rgba(220, 53, 69, 0.1);
  border-color: rgba(220, 53, 69, 0.3);
}

.seo-status-icon {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.seo-icon-success {
  background-color: #28a745;
  color: white;
}

.seo-icon-warning {
  background-color: #ffc107;
  color: white;
}

.seo-icon-danger {
  background-color: #dc3545;
  color: white;
}

.seo-icon-default {
  background-color: #6c757d;
  color: white;
}

.sticky-top {
  top: 20px;
}

/* Image Upload Styles */
.waves-effect {
  position: relative;
  overflow: hidden;
  cursor: pointer;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  width: 100%;
  height: 200px;
  text-align: center;
  line-height: 34px;
  margin: auto;
  border: 2px dashed #dee2e6;
  border-radius: 8px;
  background-color: #f8f9fa;
  transition: all 0.3s ease;
}

.waves-effect:hover {
  border-color: #0d6efd;
  background-color: #e7f3ff;
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
</style>