<template>
    <div>
      <!-- Start:: data table -->
      <div class="row">
        <div class="col-xl-12">
          <loader v-if="loading" />
          <div class="card custom-card">
            <div class="card-header justify-content-between">
              <div class="prism-toggle">
                <!-- No Add Button (Read Only) -->
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive mb-2">
                <table class="table text-nowrap table-striped">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الطالب</th>
                    <th scope="col">المرحلة الدراسية</th>
                    <th scope="col">الصف الدراسي</th>
                    <th scope="col">الملف</th>
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
                    <td>
                      <div class="hstack gap-2 fs-15">
                        <!-- Read Only, maybe Show details modal later -->
                       <span class="text-muted">Viewing Only</span>
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

    </div>
</template>

<script>
// No ModalCreateAndUpdate needed as it's read only here
import crud from "../../../composable/crud_structure";
import {onMounted, ref} from "vue";
import {useI18n} from "vue-i18n";

export default {
  name: "student-registrations",
  setup(){

    const {getData,loading,data,filterColumns,dataPaginate,step,uri,deleteData,search,type,dataRow,modalShow,pagePaginate} = crud();
    const { t } = useI18n({});
    search.value = {
      searchKey : '',
      searchInTranslations: false,
      columns: ['id'],
      searchInRelations: []
    }
    onMounted(() => {
        uri.value = 'student-registrations';
        getData();
        step.value = 1;
    });

    return {getData,filterColumns,loading,search,deleteData,data,dataPaginate,type,dataRow,modalShow,pagePaginate};

  }
}
</script>
