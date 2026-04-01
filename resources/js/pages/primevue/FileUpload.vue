<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import PrimeFileUpload from 'primevue/fileupload';
import Button from 'primevue/button';
import type { FileUploadSelectEvent, FileUploadRemoveEvent, FileUploadUploaderEvent } from 'primevue/fileupload';
import { useToast } from 'primevue/usetoast';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'File Upload', href: '/primevue/file' },
        ],
    }),
});

const toast = useToast();

const selectedFiles = ref<File[]>([]);
const totalSize = ref(0);

function onSelect(event: FileUploadSelectEvent) {
    const files: File[] = Array.isArray(event.files) ? [...event.files] : [];
    selectedFiles.value = files;
    totalSize.value = files.reduce((acc, f) => acc + f.size, 0);
}

function onRemove(event: FileUploadRemoveEvent) {
    if (event.file) {
        totalSize.value -= event.file.size;
        selectedFiles.value = selectedFiles.value.filter((f) => f !== event.file);
    }
}

function onUploader(event: FileUploadUploaderEvent) {
    const files: File[] = Array.isArray(event.files) ? [...event.files] : [];
    toast.add({ severity: 'info', summary: 'Demo Upload', detail: `${files.length} file(s) would be uploaded`, life: 3000 });
}

function formatSize(bytes: number) {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
</script>

<template>
    <Head title="File Upload" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">File Upload</h1>
            <p class="text-muted-foreground">FileUpload component with basic, advanced, and custom modes.</p>
        </div>

        <!-- Basic Upload -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Basic</h2>
            <p class="text-sm text-muted-foreground">Simple file input with auto-upload mode.</p>
            <PrimeFileUpload
                mode="basic"
                name="demo[]"
                accept="image/*"
                :max-file-size="1000000"
                choose-label="Choose Image"
                :custom-upload="true"
                @uploader="onUploader"
            />
        </section>

        <!-- Basic Multiple -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Basic Multiple</h2>
            <p class="text-sm text-muted-foreground">Basic mode allowing multiple file selection.</p>
            <PrimeFileUpload
                mode="basic"
                name="demo[]"
                :multiple="true"
                accept="image/*"
                :max-file-size="1000000"
                choose-label="Choose Files"
                :custom-upload="true"
                @uploader="onUploader"
            />
        </section>

        <!-- Advanced Upload -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Advanced</h2>
            <p class="text-sm text-muted-foreground">Advanced mode with drag-and-drop, preview, and file management.</p>
            <PrimeFileUpload
                name="demo[]"
                :multiple="true"
                accept="image/*"
                :max-file-size="2000000"
                :custom-upload="true"
                @select="onSelect"
                @remove="onRemove"
                @uploader="onUploader"
            >
                <template #empty>
                    <div class="flex flex-col items-center gap-2 py-8 text-muted-foreground">
                        <i class="pi pi-cloud-upload text-4xl" />
                        <p>Drag and drop files here to upload</p>
                    </div>
                </template>
            </PrimeFileUpload>
            <p v-if="selectedFiles.length" class="text-sm text-muted-foreground">
                {{ selectedFiles.length }} file(s) selected — Total: {{ formatSize(totalSize) }}
            </p>
        </section>

        <!-- Custom Upload with Template -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Custom Template</h2>
            <p class="text-sm text-muted-foreground">FileUpload with fully customized header and content slots.</p>
            <PrimeFileUpload
                name="demo[]"
                :multiple="true"
                accept="image/*"
                :max-file-size="2000000"
                :custom-upload="true"
                @uploader="onUploader"
            >
                <template #header="{ chooseCallback, uploadCallback, clearCallback, files }">
                    <div class="flex flex-wrap items-center justify-between gap-3 w-full">
                        <div class="flex gap-2">
                            <Button icon="pi pi-images" label="Choose" outlined @click="chooseCallback()" />
                            <Button
                                icon="pi pi-cloud-upload"
                                label="Upload"
                                :disabled="!files || files.length === 0"
                                @click="uploadCallback()"
                            />
                            <Button
                                icon="pi pi-times"
                                label="Clear"
                                severity="danger"
                                outlined
                                :disabled="!files || files.length === 0"
                                @click="clearCallback()"
                            />
                        </div>
                        <span class="text-sm text-muted-foreground">
                            {{ files?.length || 0 }} file(s) selected
                        </span>
                    </div>
                </template>
                <template #empty>
                    <div class="flex flex-col items-center gap-2 py-8 text-muted-foreground">
                        <i class="pi pi-upload text-4xl" />
                        <p class="font-semibold">Drop files here</p>
                        <p class="text-sm">Supports: images up to 2 MB</p>
                    </div>
                </template>
            </PrimeFileUpload>
        </section>
    </div>
</template>
