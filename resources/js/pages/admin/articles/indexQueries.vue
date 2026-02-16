<template>
    <div>
      <!-- Start:: data table -->
      <div class="row">
        <div class="col-xl-12">
          <loader v-if="loading" />
          <div class="card custom-card">
           
            <div class="card-body">
              <div class="table-responsive mb-2">
                <table class="table text-nowrap table-striped">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ $t('global.name') }}</th>
                    <th scope="col">{{ $t('global.email') }}</th>
                    <th scope="col">{{ $t('global.comment') }}</th>
                    <th scope="col">{{ $t('global.article') }}</th>
                    <th scope="col">{{ $t('global.date') }}</th>
                  </tr>
                  </thead>
                  <tbody v-if="data && data.length">
                  <tr v-for="(item,index) in data" :key="item.id">
                    <td scope="row">{{index + 1}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.email}}</td>
                    <td>{{item.comment}}</td>
                    <td>{{item.article}}</td>
                    <td>{{item.created_at}}</td>
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
      <ModalCreateAndUpdate v-model="modalShow" :type="type" :dataRow="dataRow" @created="getData(pagePaginate)" />

    </div>
</template>

<script>
import ModalCreateAndUpdate from "./ModalCreateAndUpdate.vue";
import crud from "../../../composable/crud_structure";
import {onMounted, ref} from "vue";
import {useI18n} from "vue-i18n";

export default {
  name: "articleCategory",
  components:{
    ModalCreateAndUpdate
  },
  setup(){

    const {getData,loading,data,dataPaginate,step,uri,showModelCreate,showEditMode,deleteData,search,type,dataRow,modalShow,pagePaginate} = crud();
    const { t } = useI18n({});
  
    search.value = {
      searchKey : '',
      searchInTranslations: true,
      columns: ['id'],
      searchInRelations: [

      ]
    }
    onMounted(() => {
        uri.value = 'articlesQueries';
        getData();
        step.value = 1;
    });

   


    return {getData,loading,search,deleteData,showEditMode,showModelCreate,data,dataPaginate,type,dataRow,modalShow,pagePaginate};

  }
}
</script>

<style scoped>

</style>