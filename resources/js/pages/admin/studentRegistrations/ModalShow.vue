<template>
    <div class="modal fade" id="student-registration-show" tabindex="-1"
         aria-labelledby="exampleModalLgLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLgLabel">{{ $t('global.ShowDetails') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">{{ $t('global.StudentName') }}:</label>
                            <p>{{ dataRow.student_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">{{ $t('global.Email') }}:</label>
                            <p>{{ dataRow.email || '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">{{ $t('global.Phone') }}:</label>
                            <p>{{ dataRow.phone || '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">{{ $t('global.BirthDate') }}:</label>
                            <p>{{ dataRow.birth_date || '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">{{ $t('global.EducationalStage') }}:</label>
                            <p>{{ dataRow.educational_stage?.title_ar }} / {{ dataRow.educational_stage?.title_en }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">{{ $t('global.ClassRoom') }}:</label>
                            <p>{{ dataRow.class_room?.title_ar }} / {{ dataRow.class_room?.title_en }}</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">{{ $t('global.Notes') }}:</label>
                            <p>{{ dataRow.notes || '-' }}</p>
                        </div>
                         <div class="col-md-12 mb-3" v-if="dataRow.pdf">
                            <label class="fw-bold">{{ $t('global.File') }}:</label>
                            <p>
                                <a :href="dataRow.pdf" target="_blank" class="btn btn-sm btn-info">
                                    <i class="ri-file-download-line align-middle me-1"></i> {{ $t('global.Download') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $t('global.Close') }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {defineProps, onMounted} from "vue";

const props = defineProps({
    dataRow: {
        type: Object,
        default: () => ({})
    }
});

// Re-initialize modal on show if needed, but bootstrap handles basic toggle
// You might need to use the emit event from parent to update dataRow before showing
</script>

<style scoped>
</style>
