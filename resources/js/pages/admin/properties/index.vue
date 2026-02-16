<template>
    <div>
      <!-- Start:: data table -->
      <div class="row">
        <div class="col-xl-12">
          <loader v-if="loading" />
          <div class="card custom-card">
            <div class="card-header justify-content-between">
              <div class="col-md-2">
                <Select v-model="filterColumns.columns[0].value" :filterFields="['id','name']" :options="statuses" filter
                        optionLabel="name" optionValue="id"
                        :placeholder="$t('global.status')"
                        class="w-full w-100"
                ></Select>
              </div>
              <div class="prism-toggle">
                <button @click="showModelCreate" class="btn btn-sm btn-primary-light" data-bs-toggle="modal" data-bs-target="#area-model">
                  <i class="ri-add-line me-1 fw-semibold align-middle"></i>{{ $t('global.add') }}
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive mb-2">
                <table class="table text-nowrap table-striped">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ $t('global.image') }}</th>
                    <th scope="col">{{ $t('label.title') }}</th>
                    <th scope="col">{{ $t('global.type') }}</th>
                    <th scope="col">{{ $t('global.area') }}</th>
                    <th scope="col">{{ $t('label.projects') }}</th>
                    <th scope="col">{{ $t('label.status') }}</th>
                    <th scope="col">{{ $t('global.action') }}</th>
                  </tr>
                  </thead>
                  <tbody v-if="data && data.length">
                  <tr v-for="(item,index) in data" :key="item.id">
                    <td scope="row">{{index + 1}}</td>
                    <td>
                      <div class="me-3" v-if="item.media">
                        <span class="avatar avatar-xxl bg-light">
                            <img :src="item.photo.url" alt="" style="width: 100%; height: 100%">
                        </span>
                      </div>
                    </td>
                    <td>{{item.title}}</td>
                    <td>{{item.type == 'apartment' ?'شقة' : 'فيلا'}}</td>
                    <td>{{item.area.title}}</td>
                    <td>{{item.project.title}}</td>
                    <td>
                      <span class="badge rounded-pill bg-success-transparent" v-if="item.status">{{$t('global.activated')}}</span>
                      <span class="badge rounded-pill bg-danger-transparent" v-else>{{$t('global.Inactive')}}</span>
                    </td>
                    <td>
                      <div class="hstack gap-2 fs-15">
                        <button
                                @click.prevent="showEditMode(item)"
                                data-bs-toggle="modal" data-bs-target="#area-model"
                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                            class="ri-edit-line"></i></button>
                        <a href="#" @click.prevent="deleteData(item.id,index)"
                           class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                            class="ri-delete-bin-line"></i></a>
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
      <ModalCreateAndUpdate  v-model="modalShow" :type="type" :dataRow="dataRow" @created="getData(pagePaginate)" />

    </div>
</template>

<script>
import ModalCreateAndUpdate from "./ModalCreateAndUpdate.vue";
import crud from "../../../composable/crud_structure";
import {onMounted, ref} from "vue";
import {useI18n} from "vue-i18n";
import adminApi from "../../../api/adminAxios";

export default {
  name: "districts",
  components:{
    ModalCreateAndUpdate
  },
  setup(){
    

    const {getData,loading,data,filterColumns,dataPaginate,step,uri,showModelCreate,showEditMode,deleteData,search,type,dataRow,modalShow,pagePaginate} = crud();
    const { t } = useI18n({});
    const statuses = ref([
      { id: 0, name: t('global.Inactive') },
      { id: 1, name: t('global.active')  },
    ]);
    search.value = {
      searchKey : '',
      searchInTranslations: true,
      columns: ['id'],
      searchInRelations: [

      ]
    }


    onMounted(() => {
        uri.value = 'properties';
        getData();
        step.value = 1;
    });

    filterColumns.value = {
      columns: [
        {
          searchType: 'where',
          opreator: '=',
          column: 'status',
          value: '',
        },
      ],
    }


    return {getData,statuses,filterColumns,loading,search,deleteData,showEditMode,showModelCreate,data,dataPaginate,type,dataRow,modalShow,pagePaginate};

  }
}
</script>

<style scoped>

</style>