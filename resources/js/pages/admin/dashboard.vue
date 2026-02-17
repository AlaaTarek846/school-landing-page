<template>
  <div class="p-4">
    <!-- Stats Grid -->
    <div class="row mb-4">
      <div class="col-xl-3 col-md-6 mb-4" v-for="(stat, key) in statsCards" :key="key">
        <a :href="stat.url" class="text-decoration-none h-100">
          <Card class="h-100 shadow-sm border-0 stat-card">
            <template #content>
              <div class="d-flex align-items-center">
                <div :class="`rounded-circle p-3 bg-${stat.color} bg-opacity-10 me-3`">
                  <i :class="`pi ${stat.icon} text-${stat.color} fs-4`"></i>
                </div>
                <div>
                  <p class="text-muted mb-1">{{ stat.label }}</p>
                  <h3 class="fw-bold mb-0">{{ stat.value }}</h3>
                </div>
              </div>
            </template>
          </Card>
        </a>
      </div>
    </div>

    <div class="row">
      <!-- Chart Selection -->
      <div class="col-lg-7 mb-4">
        <Card class="shadow-sm border-0 h-100">
          <template #title>
            <div class="fs-5 fw-bold mb-3">{{ $t('translation.dashboard.chart.registrations_by_stage') }}</div>
          </template>
          <template #content>
            <Chart type="bar" :data="chartData" :options="chartOptions" class="h-100" />
          </template>
        </Card>
      </div>

      <!-- Quick Actions -->
      <div class="col-lg-5 mb-4">
        <Card class="shadow-sm border-0 h-100">
          <template #title>
            <div class="fs-5 fw-bold mb-3">{{ $t('translation.dashboard.quick_actions') }}</div>
          </template>
          <template #content>
            <div class="d-grid gap-3">
              <a :href="link.url" class="btn btn-outline-primary d-flex align-items-center justify-content-between p-3" v-for="link in quickLinks" :key="link.label">
                <span><i :class="`pi ${link.icon} me-2`"></i> {{ link.label }}</span>
                <i class="pi pi-chevron-right fs-small"></i>
              </a>
            </div>
          </template>
        </Card>
      </div>
    </div>

    <!-- Tables Row -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <Card class="shadow-sm border-0">
          <template #title>
            <div class="fs-5 fw-bold mb-3">{{ $t('translation.dashboard.recent.registrations') }}</div>
          </template>
          <template #content>
            <DataTable :value="recentRegistrations" responsiveLayout="scroll" class="p-datatable-sm">
              <Column field="student_name" :header="$t('website.student_name')"></Column>
              <Column :header="$t('website.educational_stage')">
                <template #body="slotProps">
                  {{ slotProps.data.educational_stage?.title }}
                </template>
              </Column>
              <Column field="created_at" :header="$t('global.created_at')">
                <template #body="slotProps">
                  {{ formatDate(slotProps.data.created_at) }}
                </template>
              </Column>
            </DataTable>
          </template>
        </Card>
      </div>

      <div class="col-lg-6 mb-4">
        <Card class="shadow-sm border-0">
          <template #title>
            <div class="fs-5 fw-bold mb-3">{{ $t('translation.dashboard.recent.messages') }}</div>
          </template>
          <template #content>
            <DataTable :value="recentMessages" responsiveLayout="scroll" class="p-datatable-sm">
              <Column field="name" :header="$t('website.Name')"></Column>
              <Column field="subject" :header="$t('website.Your Subject')"></Column>
              <Column field="created_at" :header="$t('global.created_at')">
                <template #body="slotProps">
                  {{ formatDate(slotProps.data.created_at) }}
                </template>
              </Column>
            </DataTable>
          </template>
        </Card>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';
import Card from 'primevue/card';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Chart from 'primevue/chart';

const { t } = useI18n();

const loading = ref(true);
const stats = ref({});
const recentRegistrations = ref([]);
const recentMessages = ref([]);
const rawChartData = ref([]);

const statsCards = computed(() => [
  { label: t('translation.dashboard.stats.registrations'), value: stats.value.registrations_count || 0, icon: 'pi-users', color: 'primary', url: '/admin/page/student-registrations' },
  { label: t('translation.dashboard.stats.messages'), value: stats.value.messages_count || 0, icon: 'pi-envelope', color: 'success', url: '/admin/page/contact-messages' },
  { label: t('translation.dashboard.stats.stages'), value: stats.value.stages_count || 0, icon: 'pi-map', color: 'info', url: '/admin/page/educational-stages' },
  { label: t('translation.dashboard.stats.tours'), value: stats.value.tours_count || 0, icon: 'pi-images', color: 'warning', url: '/admin/page/campus-tours' },
]);

const quickLinks = computed(() => [
  { label: t('translation.campus-tours'), url: '/admin/page/campus-tours', icon: 'pi-camera' },
  { label: t('translation.teams'), url: '/admin/page/team', icon: 'pi-id-card' },
  { label: t('translation.settings'), url: '/admin/page/setting', icon: 'pi-cog' },
]);

const chartData = computed(() => ({
  labels: rawChartData.value.map(item => item.label),
  datasets: [
    {
      label: t('translation.dashboard.stats.registrations'),
      data: rawChartData.value.map(item => item.count),
      backgroundColor: ['#42A5F5', '#66BB6A', '#FFA726', '#26C6DA', '#7E57C2', '#FF7043'],
      borderRadius: 10,
    }
  ]
}));

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { display: false }
  },
  scales: {
    y: {
      beginAtZero: true,
      grid: { display: false }
    },
    x: {
      grid: { display: false }
    }
  }
};

const fetchData = async () => {
  try {
    const response = await axios.get('/api/dashboard-stats');
    stats.value = response.data.stats;
    recentRegistrations.value = response.data.recentRegistrations;
    recentMessages.value = response.data.recentMessages;
    rawChartData.value = response.data.chartData;
  } catch (error) {
    console.error('Error fetching dashboard stats:', error);
  } finally {
    loading.value = false;
  }
};

const formatDate = (dateString) => {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleDateString();
};

onMounted(() => {
  fetchData();
});
</script>

<style scoped>
.fs-small { font-size: 0.75rem; }
:deep(.p-card-body) { padding: 1.5rem; }
:deep(.p-datatable .p-datatable-thead > tr > th) {
  background: transparent;
  font-weight: 600;
  border-bottom-width: 1px;
}
.stat-card {
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}
.btn-outline-primary:hover {
  color: white !important;
}
</style>