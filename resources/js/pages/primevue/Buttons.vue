<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Button from 'primevue/button';
import SplitButton from 'primevue/splitbutton';
import SpeedDial from 'primevue/speeddial';
import ButtonGroup from 'primevue/buttongroup';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Buttons', href: '/primevue/buttons' },
        ],
    }),
});

const toast = useToast();
const loading = ref(false);

function handleClick(msg: string) {
    toast.add({ severity: 'info', summary: 'Clicked', detail: msg, life: 2000 });
}

function simulateLoad() {
    loading.value = true;
    setTimeout(() => (loading.value = false), 2000);
}

const splitItems = [
    { label: 'Update', icon: 'pi pi-refresh', command: () => handleClick('Update clicked') },
    { label: 'Delete', icon: 'pi pi-trash', command: () => handleClick('Delete clicked') },
    { label: 'Upload', icon: 'pi pi-upload', command: () => handleClick('Upload clicked') },
];

const speedDialItems = [
    { label: 'Add', icon: 'pi pi-pencil', command: () => handleClick('Add') },
    { label: 'Update', icon: 'pi pi-refresh', command: () => handleClick('Update') },
    { label: 'Delete', icon: 'pi pi-trash', command: () => handleClick('Delete') },
    { label: 'Upload', icon: 'pi pi-upload', command: () => handleClick('Upload') },
];
</script>

<template>
    <Head title="Button Components" />
    <Toast />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Button Components</h1>
            <p class="text-muted-foreground">Button, SplitButton, SpeedDial with all variants.</p>
        </div>

        <!-- Basic Buttons -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Basic Buttons</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Primary" @click="handleClick('Primary')" />
                <Button label="Secondary" severity="secondary" @click="handleClick('Secondary')" />
                <Button label="Success" severity="success" @click="handleClick('Success')" />
                <Button label="Warning" severity="warn" @click="handleClick('Warning')" />
                <Button label="Danger" severity="danger" @click="handleClick('Danger')" />
                <Button label="Info" severity="info" @click="handleClick('Info')" />
                <Button label="Contrast" severity="contrast" @click="handleClick('Contrast')" />
            </div>
        </section>

        <!-- Outlined Buttons -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Outlined</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Primary" outlined @click="handleClick('Outlined Primary')" />
                <Button label="Secondary" severity="secondary" outlined />
                <Button label="Success" severity="success" outlined />
                <Button label="Warning" severity="warn" outlined />
                <Button label="Danger" severity="danger" outlined />
                <Button label="Info" severity="info" outlined />
            </div>
        </section>

        <!-- Text Buttons -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Text</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Primary" text />
                <Button label="Secondary" severity="secondary" text />
                <Button label="Success" severity="success" text />
                <Button label="Warning" severity="warn" text />
                <Button label="Danger" severity="danger" text />
                <Button label="Info" severity="info" text />
            </div>
        </section>

        <!-- Raised Buttons -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Raised</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Primary" raised />
                <Button label="Secondary" severity="secondary" raised />
                <Button label="Success" severity="success" raised />
                <Button label="Warning" severity="warn" raised />
                <Button label="Danger" severity="danger" raised />
            </div>
        </section>

        <!-- Rounded Buttons -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Rounded</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Primary" rounded />
                <Button label="Secondary" severity="secondary" rounded />
                <Button label="Success" severity="success" rounded />
                <Button label="Warning" severity="warn" rounded />
                <Button label="Danger" severity="danger" rounded />
            </div>
        </section>

        <!-- Icon Buttons -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Icons</h2>
            <div class="flex flex-wrap gap-3 items-center">
                <Button label="Search" icon="pi pi-search" />
                <Button label="Search" icon="pi pi-search" icon-pos="right" />
                <Button icon="pi pi-search" rounded aria-label="Search" />
                <Button icon="pi pi-home" rounded outlined aria-label="Home" />
                <Button icon="pi pi-check" severity="success" rounded aria-label="Done" />
                <Button icon="pi pi-trash" severity="danger" text rounded aria-label="Delete" />
            </div>
        </section>

        <!-- Sizes -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Sizes</h2>
            <div class="flex flex-wrap gap-3 items-center">
                <Button label="Small" size="small" />
                <Button label="Normal" />
                <Button label="Large" size="large" />
            </div>
        </section>

        <!-- Loading -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Loading State</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Loading..." :loading="true" />
                <Button label="Click to Load" :loading="loading" @click="simulateLoad" icon="pi pi-check" />
            </div>
        </section>

        <!-- SplitButton -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">SplitButton</h2>
            <div class="flex flex-wrap gap-3">
                <SplitButton label="Save" icon="pi pi-check" :model="splitItems" @click="handleClick('Save')" />
                <SplitButton label="Save" icon="pi pi-check" :model="splitItems" severity="secondary" @click="handleClick('Save')" />
                <SplitButton label="Save" icon="pi pi-check" :model="splitItems" severity="success" @click="handleClick('Save')" />
                <SplitButton label="Save" icon="pi pi-check" :model="splitItems" outlined @click="handleClick('Save')" />
                <SplitButton label="Save" icon="pi pi-check" :model="splitItems" rounded @click="handleClick('Save')" />
            </div>
        </section>

        <!-- SpeedDial -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">SpeedDial</h2>
            <div class="flex flex-wrap gap-16">
                <div class="relative h-20 flex items-center justify-center w-20">
                    <SpeedDial :model="speedDialItems" direction="up" />
                    <p class="absolute -bottom-6 text-xs text-center text-muted-foreground">Up</p>
                </div>
                <div class="relative h-20 flex items-center justify-center w-20">
                    <SpeedDial :model="speedDialItems" direction="down" />
                    <p class="absolute -bottom-6 text-xs text-center text-muted-foreground">Down</p>
                </div>
                <div class="relative h-20 flex items-center justify-center w-20">
                    <SpeedDial :model="speedDialItems" direction="left" />
                    <p class="absolute -bottom-6 text-xs text-center text-muted-foreground">Left</p>
                </div>
                <div class="relative h-20 flex items-center justify-center w-20">
                    <SpeedDial :model="speedDialItems" direction="right" />
                    <p class="absolute -bottom-6 text-xs text-center text-muted-foreground">Right</p>
                </div>
            </div>
        </section>

        <!-- ButtonGroup -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ButtonGroup</h2>
            <div class="flex flex-wrap gap-6 items-start">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Basic Group</label>
                    <ButtonGroup>
                        <Button label="Save" icon="pi pi-check" />
                        <Button label="Delete" icon="pi pi-trash" />
                        <Button label="Cancel" icon="pi pi-times" />
                    </ButtonGroup>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Outlined Group</label>
                    <ButtonGroup>
                        <Button label="Save" icon="pi pi-check" outlined />
                        <Button label="Delete" icon="pi pi-trash" severity="danger" outlined />
                        <Button label="Cancel" icon="pi pi-times" severity="secondary" outlined />
                    </ButtonGroup>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Icon Only Group</label>
                    <ButtonGroup>
                        <Button icon="pi pi-align-left" />
                        <Button icon="pi pi-align-center" />
                        <Button icon="pi pi-align-right" />
                        <Button icon="pi pi-align-justify" />
                    </ButtonGroup>
                </div>
            </div>
        </section>
    </div>
</template>
