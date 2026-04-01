<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Dialog from 'primevue/dialog';
import ConfirmDialog from 'primevue/confirmdialog';
import DynamicDialog from 'primevue/dynamicdialog';
import Drawer from 'primevue/drawer';
import Popover from 'primevue/popover';
import Tooltip from 'primevue/tooltip';
import ConfirmPopup from 'primevue/confirmpopup';
import Toast from 'primevue/toast';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import { useConfirm } from 'primevue/useconfirm';
import { useToast } from 'primevue/usetoast';
import { useDialog } from 'primevue/usedialog';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Overlay Components', href: '/primevue/overlay' },
        ],
    }),
});

const confirm = useConfirm();
const toast = useToast();
const dialog = useDialog();

// Dialog states
const basicDialogVisible = ref(false);
const headerDialogVisible = ref(false);
const fullscreenDialogVisible = ref(false);
const maximizableDialogVisible = ref(false);

// Drawer states
const leftDrawerVisible = ref(false);
const rightDrawerVisible = ref(false);
const topDrawerVisible = ref(false);
const bottomDrawerVisible = ref(false);

// Popover
const popoverRef = ref();
const selectedMember = ref<{name:string; role:string} | null>(null);
const teamMembers = [
    { name: 'Alice Johnson', role: 'Admin', avatar: 'AJ' },
    { name: 'Bob Smith', role: 'Editor', avatar: 'BS' },
    { name: 'Carol White', role: 'Viewer', avatar: 'CW' },
];
function showPopover(event: Event, member: {name:string; role:string}) {
    selectedMember.value = member;
    popoverRef.value.show(event);
}

// ConfirmDialog
function confirmDelete() {
    confirm.require({
        message: 'Are you sure you want to delete this item?',
        header: 'Delete Confirmation',
        icon: 'pi pi-exclamation-triangle',
        rejectProps: { label: 'Cancel', severity: 'secondary', outlined: true },
        acceptProps: { label: 'Delete', severity: 'danger' },
        accept: () => toast.add({ severity: 'success', summary: 'Confirmed', detail: 'Item deleted', life: 3000 }),
        reject: () => toast.add({ severity: 'info', summary: 'Cancelled', detail: 'Action cancelled', life: 3000 }),
    });
}

// ConfirmPopup
function confirmPopup(event: Event) {
    confirm.require({
        target: event.currentTarget as HTMLElement,
        message: 'Do you want to proceed?',
        icon: 'pi pi-info-circle',
        rejectProps: { label: 'No', severity: 'secondary', size: 'small' },
        acceptProps: { label: 'Yes', size: 'small' },
        accept: () => toast.add({ severity: 'success', summary: 'Confirmed', life: 2000 }),
        reject: () => toast.add({ severity: 'info', summary: 'Rejected', life: 2000 }),
    });
}
</script>

<template>
    <Head title="Overlay Components" />
    <Toast />
    <ConfirmDialog />
    <ConfirmPopup />
    <DynamicDialog />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Overlay Components</h1>
            <p class="text-muted-foreground">Dialog, ConfirmDialog, Drawer, Popover, Tooltip, ConfirmPopup.</p>
        </div>

        <!-- Dialog -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Dialog</h2>
            <div class="flex flex-wrap gap-3">
                <!-- Basic Dialog -->
                <Button label="Basic Dialog" icon="pi pi-window-maximize" @click="basicDialogVisible = true" />
                <Dialog v-model:visible="basicDialogVisible" header="Basic Dialog" :style="{ width: '25rem' }">
                    <p class="text-sm mb-4">This is a basic dialog. It can contain any content inside.</p>
                    <div class="flex justify-end">
                        <Button label="Close" @click="basicDialogVisible = false" />
                    </div>
                </Dialog>

                <!-- Maximizable Dialog -->
                <Button label="Maximizable" icon="pi pi-arrows-alt" severity="secondary" @click="maximizableDialogVisible = true" />
                <Dialog v-model:visible="maximizableDialogVisible" header="Maximizable Dialog" :maximizable="true" :style="{ width: '30rem' }">
                    <p class="text-sm">This dialog can be maximized using the button in the header.</p>
                    <template #footer>
                        <Button label="Cancel" icon="pi pi-times" severity="secondary" text @click="maximizableDialogVisible = false" />
                        <Button label="OK" icon="pi pi-check" @click="maximizableDialogVisible = false" />
                    </template>
                </Dialog>

                <!-- Form Dialog -->
                <Button label="Form Dialog" icon="pi pi-pencil" severity="success" @click="headerDialogVisible = true" />
                <Dialog v-model:visible="headerDialogVisible" header="Edit Profile" :style="{ width: '25rem' }">
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Name</label>
                            <InputText placeholder="Enter name" class="w-full" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-medium">Email</label>
                            <InputText type="email" placeholder="Enter email" class="w-full" />
                        </div>
                    </div>
                    <template #footer>
                        <Button label="Cancel" severity="secondary" outlined @click="headerDialogVisible = false" />
                        <Button label="Save" icon="pi pi-check" @click="headerDialogVisible = false" />
                    </template>
                </Dialog>
            </div>
        </section>

        <!-- ConfirmDialog -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ConfirmDialog & ConfirmPopup</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Confirm Delete" icon="pi pi-trash" severity="danger" @click="confirmDelete" />
                <Button label="Confirm Popup" icon="pi pi-question-circle" severity="warn" @click="confirmPopup" />
            </div>
        </section>

        <!-- Drawer / Sidebar -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Drawer (Sidebar)</h2>
            <div class="flex flex-wrap gap-3">
                <Button label="Left" icon="pi pi-arrow-right" @click="leftDrawerVisible = true" />
                <Button label="Right" icon="pi pi-arrow-left" severity="secondary" @click="rightDrawerVisible = true" />
                <Button label="Top" icon="pi pi-arrow-down" severity="success" @click="topDrawerVisible = true" />
                <Button label="Bottom" icon="pi pi-arrow-up" severity="info" @click="bottomDrawerVisible = true" />
            </div>

            <Drawer v-model:visible="leftDrawerVisible" header="Left Drawer" position="left">
                <p class="text-sm">Content in the left drawer.</p>
                <ul class="mt-4 space-y-2">
                    <li v-for="i in 5" :key="i" class="flex items-center gap-2 text-sm">
                        <i class="pi pi-chevron-right text-xs text-primary" />
                        Navigation item {{ i }}
                    </li>
                </ul>
            </Drawer>
            <Drawer v-model:visible="rightDrawerVisible" header="Right Drawer" position="right">
                <p class="text-sm">Content in the right drawer.</p>
            </Drawer>
            <Drawer v-model:visible="topDrawerVisible" header="Top Drawer" position="top">
                <p class="text-sm">Content in the top drawer.</p>
            </Drawer>
            <Drawer v-model:visible="bottomDrawerVisible" header="Bottom Drawer" position="bottom">
                <p class="text-sm">Content in the bottom drawer.</p>
            </Drawer>
        </section>

        <!-- Popover -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Popover (OverlayPanel)</h2>
            <p class="text-sm text-muted-foreground">Click a team member to see their details in a popover.</p>
            <div class="flex flex-wrap gap-3">
                <Button
                    v-for="member in teamMembers"
                    :key="member.name"
                    :label="member.name"
                    severity="secondary"
                    outlined
                    @click="(e) => showPopover(e, member)"
                />
            </div>
            <Popover ref="popoverRef">
                <div v-if="selectedMember" class="p-1 space-y-2 min-w-36">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-xs font-bold text-primary">
                            {{ (selectedMember as any).avatar }}
                        </div>
                        <div>
                            <div class="font-semibold text-sm">{{ selectedMember.name }}</div>
                            <div class="text-xs text-muted-foreground">{{ selectedMember.role }}</div>
                        </div>
                    </div>
                </div>
            </Popover>
        </section>

        <!-- Tooltip -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Tooltip</h2>
            <div class="flex flex-wrap gap-4">
                <Button v-tooltip="'Default tooltip (top)'" label="Hover me (Top)" />
                <Button v-tooltip.right="'Right tooltip'" label="Right" severity="secondary" />
                <Button v-tooltip.bottom="'Bottom tooltip'" label="Bottom" severity="success" />
                <Button v-tooltip.left="'Left tooltip'" label="Left" severity="info" />
                <Button v-tooltip="{ value: 'Custom <b>HTML</b> tooltip', escape: false }" label="HTML Tooltip" severity="warn" />
            </div>
        </section>
    </div>
</template>
