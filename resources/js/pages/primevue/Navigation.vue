<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref, h } from 'vue';
import Menubar from 'primevue/menubar';
import Menu from 'primevue/menu';
import PanelMenu from 'primevue/panelmenu';
import TieredMenu from 'primevue/tieredmenu';
import Breadcrumb from 'primevue/breadcrumb';
import Steps from 'primevue/steps';
import TabMenu from 'primevue/tabmenu';
import MegaMenu from 'primevue/megamenu';
import Button from 'primevue/button';
import Dock from 'primevue/dock';
import type { MenuItem } from 'primevue/menuitem';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Navigation', href: '/primevue/navigation' },
        ],
    }),
});

const menuRef = ref();
const tieredMenuRef = ref();

// Breadcrumb
const breadcrumbHome = ref<MenuItem>({ icon: 'pi pi-home', label: 'Home', url: '/' });
const breadcrumbItems = ref<MenuItem[]>([
    { label: 'Components' },
    { label: 'PrimeVue' },
    { label: 'Navigation' },
]);

// Steps
const stepsActiveIndex = ref(1);
const stepsItems = ref<MenuItem[]>([
    { label: 'Personal Info' },
    { label: 'Account Setup' },
    { label: 'Confirmation' },
    { label: 'Complete' },
]);

// TabMenu
const tabMenuActive = ref(0);
const tabMenuItems = ref<MenuItem[]>([
    { label: 'Dashboard', icon: 'pi pi-home' },
    { label: 'Transactions', icon: 'pi pi-chart-line' },
    { label: 'Products', icon: 'pi pi-list' },
    { label: 'Messages', icon: 'pi pi-inbox' },
]);

// Menubar
const menubarItems = ref<MenuItem[]>([
    {
        label: 'File',
        icon: 'pi pi-file',
        items: [
            { label: 'New', icon: 'pi pi-plus' },
            { label: 'Open', icon: 'pi pi-folder-open' },
            { separator: true },
            { label: 'Save', icon: 'pi pi-save' },
            { label: 'Save As', icon: 'pi pi-file-export' },
            { separator: true },
            { label: 'Exit', icon: 'pi pi-power-off' },
        ],
    },
    {
        label: 'Edit',
        icon: 'pi pi-pencil',
        items: [
            { label: 'Undo', icon: 'pi pi-undo' },
            { label: 'Redo', icon: 'pi pi-refresh' },
            { separator: true },
            { label: 'Cut', icon: 'pi pi-times' },
            { label: 'Copy', icon: 'pi pi-copy' },
            { label: 'Paste', icon: 'pi pi-clone' },
        ],
    },
    {
        label: 'View',
        icon: 'pi pi-eye',
        items: [
            { label: 'Zoom In', icon: 'pi pi-search-plus' },
            { label: 'Zoom Out', icon: 'pi pi-search-minus' },
        ],
    },
    { label: 'Help', icon: 'pi pi-question-circle' },
]);

// Popup Menu
const menuItems = ref<MenuItem[]>([
    { label: 'New', icon: 'pi pi-plus' },
    { label: 'Edit', icon: 'pi pi-pencil' },
    { label: 'Delete', icon: 'pi pi-trash', class: 'text-red-500' },
    { separator: true },
    { label: 'Settings', icon: 'pi pi-cog' },
]);

// TieredMenu popup
const tieredMenuItems = ref<MenuItem[]>([
    {
        label: 'Actions',
        icon: 'pi pi-cog',
        items: [
            { label: 'Edit', icon: 'pi pi-pencil' },
            { label: 'Duplicate', icon: 'pi pi-copy' },
            {
                label: 'Export',
                icon: 'pi pi-file-export',
                items: [
                    { label: 'CSV', icon: 'pi pi-file' },
                    { label: 'Excel', icon: 'pi pi-file-excel' },
                    { label: 'PDF', icon: 'pi pi-file-pdf' },
                ],
            },
            { separator: true },
            { label: 'Delete', icon: 'pi pi-trash' },
        ],
    },
]);

// PanelMenu
const panelMenuItems = ref<MenuItem[]>([
    {
        label: 'Mail',
        icon: 'pi pi-envelope',
        items: [
            { label: 'Inbox', icon: 'pi pi-inbox' },
            { label: 'Sent', icon: 'pi pi-send' },
            { label: 'Drafts', icon: 'pi pi-file' },
            { label: 'Trash', icon: 'pi pi-trash' },
        ],
    },
    {
        label: 'Reports',
        icon: 'pi pi-chart-bar',
        items: [
            { label: 'Sales', icon: 'pi pi-dollar' },
            { label: 'Revenue', icon: 'pi pi-chart-line' },
        ],
    },
    {
        label: 'Settings',
        icon: 'pi pi-cog',
        items: [
            { label: 'Profile', icon: 'pi pi-user' },
            { label: 'Security', icon: 'pi pi-shield' },
            { label: 'Notifications', icon: 'pi pi-bell' },
        ],
    },
]);

// MegaMenu
const megaMenuItems = ref<MenuItem[]>([
    {
        label: 'Furniture',
        icon: 'pi pi-box',
        items: [
            [
                { label: 'Living Room', items: [{ label: 'Sofas' }, { label: 'Coffee Tables' }] },
                { label: 'Bedroom', items: [{ label: 'Beds' }, { label: 'Wardrobes' }] },
            ],
            [
                { label: 'Office', items: [{ label: 'Desks' }, { label: 'Office Chairs' }] },
            ],
        ],
    },
    {
        label: 'Electronics',
        icon: 'pi pi-mobile',
        items: [
            [
                { label: 'Computers', items: [{ label: 'Laptops' }, { label: 'Desktops' }] },
                { label: 'Phones', items: [{ label: 'Smartphones' }, { label: 'Accessories' }] },
            ],
        ],
    },
    { label: 'Deals', icon: 'pi pi-tag' },
    { label: 'About', icon: 'pi pi-info-circle' },
]);

// Dock
const dockItems = ref([
    { label: 'Finder', icon: () => h('i', { class: 'pi pi-folder text-2xl text-blue-400' }) },
    { label: 'Terminal', icon: () => h('i', { class: 'pi pi-desktop text-2xl text-gray-600' }) },
    { label: 'App Store', icon: () => h('i', { class: 'pi pi-shopping-bag text-2xl text-blue-500' }) },
    { label: 'Settings', icon: () => h('i', { class: 'pi pi-cog text-2xl text-gray-500' }) },
    { label: 'Photos', icon: () => h('i', { class: 'pi pi-image text-2xl text-orange-400' }) },
]);
</script>

<template>
    <Head title="Navigation" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Navigation Components</h1>
            <p class="text-muted-foreground">Menubar, Menu, PanelMenu, TieredMenu, Breadcrumb, Steps, TabMenu, MegaMenu.</p>
        </div>

        <!-- Breadcrumb -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Breadcrumb</h2>
            <Breadcrumb :home="breadcrumbHome" :model="breadcrumbItems" />
        </section>

        <!-- Steps -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Steps (Wizard)</h2>
            <Steps :model="stepsItems" v-model:active-step="stepsActiveIndex" />
            <div class="flex gap-2">
                <Button label="Prev" icon="pi pi-arrow-left" :disabled="stepsActiveIndex === 0" @click="stepsActiveIndex--" size="small" severity="secondary" />
                <Button label="Next" icon="pi pi-arrow-right" icon-pos="right" :disabled="stepsActiveIndex === stepsItems.length - 1" @click="stepsActiveIndex++" size="small" />
            </div>
        </section>

        <!-- TabMenu -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">TabMenu</h2>
            <TabMenu :model="tabMenuItems" v-model:active-index="tabMenuActive" />
            <div class="p-3 border rounded-lg text-sm">
                Active tab: <strong>{{ tabMenuItems[tabMenuActive]?.label }}</strong>
            </div>
        </section>

        <!-- Menubar -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Menubar</h2>
            <Menubar :model="menubarItems">
                <template #start>
                    <i class="pi pi-prime text-primary text-xl mr-2" />
                </template>
                <template #end>
                    <Button icon="pi pi-user" rounded outlined size="small" />
                </template>
            </Menubar>
        </section>

        <!-- MegaMenu -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">MegaMenu</h2>
            <MegaMenu :model="megaMenuItems" />
        </section>

        <!-- Popup Menu & TieredMenu -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Popup Menu & TieredMenu</h2>
            <div class="flex flex-wrap gap-4">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Popup Menu</label>
                    <Button
                        label="Open Menu"
                        icon="pi pi-bars"
                        severity="secondary"
                        @click="(e) => menuRef.toggle(e)"
                    />
                    <Menu ref="menuRef" :model="menuItems" :popup="true" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">TieredMenu (nested)</label>
                    <Button
                        label="Actions ▼"
                        icon="pi pi-chevron-down"
                        icon-pos="right"
                        severity="secondary"
                        @click="(e) => tieredMenuRef.toggle(e)"
                    />
                    <TieredMenu ref="tieredMenuRef" :model="tieredMenuItems" :popup="true" />
                </div>
            </div>
        </section>

        <!-- PanelMenu -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">PanelMenu (Sidebar Navigation)</h2>
            <div class="w-64 border rounded-lg overflow-hidden">
                <PanelMenu :model="panelMenuItems" />
            </div>
        </section>

        <!-- Dock -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Dock</h2>
            <p class="text-sm text-muted-foreground">macOS-style dock with magnification on hover.</p>
            <div class="relative overflow-hidden bg-surface-100 dark:bg-surface-800 rounded-xl" style="height: 200px;">
                <Dock :model="dockItems" position="bottom">
                    <template #item="{ item }">
                        <a v-tooltip.top="item.label" class="p-dock-item-link">
                            <component :is="item.icon" />
                        </a>
                    </template>
                </Dock>
            </div>
        </section>
    </div>
</template>
