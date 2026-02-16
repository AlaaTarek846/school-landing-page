<template>
    <div>
      <!-- Start:: data table -->
      <div class="row">
        <div class="col-xl-12">
          <loader v-if="loading" />
          <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    {{ $t('global.StudentRegistrations') }} <span class="badge bg-secondary text-light ms-2">{{ dataPaginate?.total || 0 }}</span>
                </div>
              <div class="prism-toggle">
                <!-- No Add Button (Read Only) -->
              </div>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-md-3">
                         <label class="form-label">{{ $t('global.SearchKeys') }}</label>
                        <input type="text" class="form-control" v-model="search.search_key" @input="getData(1)" :placeholder="$t('global.SearchKeys')">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $t('global.EducationalStage') }}</label>
                        <select class="form-select" v-model="search.educational_stage_id" @change="getData(1)">
                            <option value="">{{ $t('global.all') }}</option>
                            <option v-for="stage in educationalStages" :key="stage.id" :value="stage.id">
                                {{ stage.title_ar }} / {{ stage.title_en }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{{ $t('global.ClassRoom') }}</label>
                        <select class="form-select" v-model="search.class_id" @change="getData(1)">
                            <option value="">{{ $t('global.all') }}</option>
                            <option v-for="room in classRooms" :key="room.id" :value="room.id">
                                {{ room.title_ar }} / {{ room.title_en }}
                            </option>
                        </select>
                    </div>
                     <div class="col-md-3">
                         <label class="form-label">{{ $t('global.date') }}</label>
                        <input type="date" class="form-control" v-model="search.date" @change="getData(1)">
                    </div>
                </div>
              <div class="table-responsive mb-2">
                <table class="table text-nowrap table-striped">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الطالب</th>
                    <th scope="col">المرحلة الدراسية</th>
                    <th scope="col">الصف الدراسي</th>
                    <th scope="col">الملف</th>
                    <th scope="col">{{ $t('global.date') }}</th>
                    <th scope="col">{{ $t('global.action') }}</th>
                  </tr>
                  </thead>
                  <tbody v-if="data && data.length">
                  <tr v-for="(item,index) in data" :key="item.id">
                    <td scope="row">{{index + 1}}</td>
                    <td>{{item.student_name}}</td>
                    <td>{{item.educational_stage?.title_ar}}</td>
                    <td>{{item.class_room?.title_ar}}</td>
                    <td>
                        <a v-if="item.pdf" :href="item.pdf" target="_blank" class="text-primary">Download PDF</a>
                        <span v-else>-</span>
                    </td>
                    <td>{{ item.created_at }}</td>
                    <td>
                      <div class="hstack gap-2 fs-15">
                        <button type="button" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"
                                @click="showEditMode(item)"
                                data-bs-toggle="modal" data-bs-target="#student-registration-show">
                            <i class="ri-eye-line"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                  <tbody v-else>
                  <tr>
                    <th class="text-center" colspan="10">{{ $t('global.NoDataFound') }}</th>
                  </tr>
                  </tbody>
                </table>
              </div>
              <Pagination :limit="2" :data="dataPaginate" @pagination-change-page="getData">
                <template #prev-nav>
                  <span>&lt; {{$t('global.Previous')}}</span>
                </template>
                <template #next-nav>
                  <span>{{$t('global.Next')}} &gt;</span>
                </template>
              </Pagination>
            </div>
          </div>
        </div>
      </div>
      <!-- End:: data table -->
        <ModalShow :dataRow="dataRow" />
    </div>
</template>

<script>
import ModalShow from "./ModalShow.vue";
import crud from "../../../composable/crud_structure";
import {onMounted, ref} from "vue";
import {useI18n} from "vue-i18n";

export default {
  name: "student-registrations",
  components: {
      ModalShow
  },
  setup(){

    const {getData,loading,data,filterColumns,dataPaginate,step,uri,deleteData,search,type,dataRow,modalShow,pagePaginate,showEditMode} = crud();
    const { t } = useI18n({});
    const educationalStages = ref([]);
    const classRooms = ref([]);

    search.value = {
      search_key : '',
      educational_stage_id: '',
      class_id: '',
      date: '',
    }

    const getEducationalStages = async () => {
        try {
            const response = await axios.get('/api/educational-stages?per_page=100'); // Assuming endpoint exists and returns list
            educationalStages.value = response.data.data;
        } catch (error) {
            console.error(error);
        }
    }

      const getClassRooms = async () => {
        try {
            const response = await axios.get('/api/class-rooms?per_page=100'); // Assuming endpoint exists
            classRooms.value = response.data.data;
        } catch (error) {
            console.error(error);
        }
    }

    onMounted(() => {
        uri.value = 'student-registrations';
        getData();
        getEducationalStages();
        getClassRooms();
        step.value = 1;
    });

    return {getData,filterColumns,loading,search,deleteData,data,dataPaginate,type,dataRow,modalShow,pagePaginate,showEditMode, educationalStages, classRooms};

  }
}
</script>
