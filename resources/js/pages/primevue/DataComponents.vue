<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';
import Row from 'primevue/row';
import DataView from 'primevue/dataview';
import Tree from 'primevue/tree';
import TreeTable from 'primevue/treetable';
import Timeline from 'primevue/timeline';
import Paginator from 'primevue/paginator';
import Tag from 'primevue/tag';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import type { TreeNode } from 'primevue/treenode';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Data Components', href: '/primevue/data' },
        ],
    }),
});

// --- DataTable ---
interface Product {
    id: number;
    name: string;
    category: string;
    quantity: number;
    status: string;
    price: number;
}

const tableFilter = ref('');
const selectedRow = ref<Product | null>(null);
const products = ref([
    { id: 1, name: 'Bamboo Watch', category: 'Accessories', quantity: 24, status: 'INSTOCK', price: 65 },
    { id: 2, name: 'Blue Band', category: 'Fitness', quantity: 12, status: 'LOWSTOCK', price: 79 },
    { id: 3, name: 'Blue T-Shirt', category: 'Clothing', quantity: 0, status: 'OUTOFSTOCK', price: 29 },
    { id: 4, name: 'Bracelet', category: 'Accessories', quantity: 73, status: 'INSTOCK', price: 15 },
    { id: 5, name: 'Brown Purse', category: 'Accessories', quantity: 0, status: 'OUTOFSTOCK', price: 120 },
    { id: 6, name: 'Chakra Bracelet', category: 'Accessories', quantity: 5, status: 'LOWSTOCK', price: 32 },
    { id: 7, name: 'Galaxy Earrings', category: 'Accessories', quantity: 23, status: 'INSTOCK', price: 34 },
    { id: 8, name: 'Game Controller', category: 'Electronics', quantity: 2, status: 'LOWSTOCK', price: 99 },
    { id: 9, name: 'Gaming Set', category: 'Electronics', quantity: 0, status: 'OUTOFSTOCK', price: 299 },
    { id: 10, name: 'Gold Phone Case', category: 'Accessories', quantity: 24, status: 'INSTOCK', price: 24 },
]);

const filteredProducts = computed(() => {
    if (!tableFilter.value) return products.value;
    return products.value.filter(p =>
        p.name.toLowerCase().includes(tableFilter.value.toLowerCase()) ||
        p.category.toLowerCase().includes(tableFilter.value.toLowerCase())
    );
});

function getSeverity(status: string) {
    switch (status) {
        case 'INSTOCK': return 'success';
        case 'LOWSTOCK': return 'warn';
        case 'OUTOFSTOCK': return 'danger';
        default: return 'info';
    }
}

// --- Tree ---
const treeNodes = ref<TreeNode[]>([
    {
        key: '0',
        label: 'Documents',
        icon: 'pi pi-fw pi-inbox',
        children: [
            {
                key: '0-0',
                label: 'Work',
                icon: 'pi pi-fw pi-cog',
                children: [
                    { key: '0-0-0', label: 'Expenses.doc', icon: 'pi pi-fw pi-file' },
                    { key: '0-0-1', label: 'Resume.doc', icon: 'pi pi-fw pi-file' },
                ],
            },
            {
                key: '0-1',
                label: 'Home',
                icon: 'pi pi-fw pi-home',
                children: [
                    { key: '0-1-0', label: 'Invoices.txt', icon: 'pi pi-fw pi-file' },
                ],
            },
        ],
    },
    {
        key: '1',
        label: 'Events',
        icon: 'pi pi-fw pi-calendar',
        children: [
            { key: '1-0', label: 'Meeting', icon: 'pi pi-fw pi-calendar-plus' },
            { key: '1-1', label: 'Product Launch', icon: 'pi pi-fw pi-calendar-plus' },
            { key: '1-2', label: 'Report Review', icon: 'pi pi-fw pi-calendar-plus' },
        ],
    },
    {
        key: '2',
        label: 'Movies',
        icon: 'pi pi-fw pi-star-fill',
        children: [
            {
                key: '2-0',
                label: 'Al Pacino',
                icon: 'pi pi-fw pi-video',
                children: [
                    { key: '2-0-0', label: 'Scarface', icon: 'pi pi-fw pi-video' },
                    { key: '2-0-1', label: 'Serpico', icon: 'pi pi-fw pi-video' },
                ],
            },
        ],
    },
]);

// --- TreeTable ---
const treeTableNodes = ref<TreeNode[]>([
    {
        key: '0',
        data: { name: 'Applications', size: '200kb', type: 'Folder' },
        children: [
            { key: '0-0', data: { name: 'Vue', size: '25kb', type: 'Folder' }, children: [
                { key: '0-0-0', data: { name: 'app.ts', size: '10kb', type: 'TypeScript' } },
            ]},
            { key: '0-1', data: { name: 'React', size: '15kb', type: 'Folder' } },
        ],
    },
    {
        key: '1',
        data: { name: 'Desktop', size: '100kb', type: 'Folder' },
        children: [
            { key: '1-0', data: { name: 'photo.jpg', size: '640kb', type: 'Image' } },
            { key: '1-1', data: { name: 'notes.txt', size: '5kb', type: 'Text' } },
        ],
    },
]);

// --- Timeline ---
const timelineEvents = ref([
    { status: 'Ordered', date: '15/10/2024 10:30', icon: 'pi pi-shopping-cart', color: '#9C27B0' },
    { status: 'Processing', date: '15/10/2024 14:00', icon: 'pi pi-cog', color: '#673AB7' },
    { status: 'Shipped', date: '15/10/2024 16:15', icon: 'pi pi-envelope', color: '#FF9800' },
    { status: 'Delivered', date: '16/10/2024 10:00', icon: 'pi pi-check', color: '#607D8B' },
]);

// --- DataView ---
const dataViewItems = ref([
    { id: 1, name: 'Bamboo Watch', price: 65, category: 'Accessories', rating: 4 },
    { id: 2, name: 'Blue Band', price: 79, category: 'Fitness', rating: 3 },
    { id: 3, name: 'Galaxy Earrings', price: 34, category: 'Accessories', rating: 5 },
    { id: 4, name: 'Game Controller', price: 99, category: 'Electronics', rating: 4 },
    { id: 5, name: 'Gold Phone Case', price: 24, category: 'Accessories', rating: 3 },
    { id: 6, name: 'Green Earbuds', price: 89, category: 'Electronics', rating: 4 },
]);

// --- Paginator ---
const paginatorFirst = ref(0);
const paginatorRows = ref(5);
</script>

<template>
    <Head title="Data Components" />

    <div class="p-6 space-y-10">
        <div>
            <h1 class="text-2xl font-bold mb-1">Data Components</h1>
            <p class="text-muted-foreground">DataTable, Tree, TreeTable, DataView, Timeline, Paginator.</p>
        </div>

        <!-- DataTable -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">DataTable</h2>
            <p class="text-sm text-muted-foreground">Sortable, filterable, selectable rows with pagination.</p>
            <IconField class="mb-4 max-w-xs">
                <InputIcon class="pi pi-search" />
                <InputText v-model="tableFilter" placeholder="Search products..." class="w-full" />
            </IconField>
            <DataTable
                :value="filteredProducts"
                v-model:selection="selectedRow"
                selection-mode="single"
                :paginator="true"
                :rows="5"
                sort-mode="multiple"
                striped-rows
                removable-sort
                class="p-datatable-sm"
            >
                <Column selection-mode="single" header-style="width: 3rem" />
                <Column field="id" header="ID" :sortable="true" style="width: 5rem" />
                <Column field="name" header="Name" :sortable="true" />
                <Column field="category" header="Category" :sortable="true" />
                <Column field="quantity" header="Qty" :sortable="true" style="width: 6rem" />
                <Column field="price" header="Price" :sortable="true">
                    <template #body="{ data }">
                        ${{ data.price }}
                    </template>
                </Column>
                <Column field="status" header="Status">
                    <template #body="{ data }">
                        <Tag :value="data.status" :severity="getSeverity(data.status)" />
                    </template>
                </Column>
            </DataTable>
            <p v-if="selectedRow" class="text-sm text-muted-foreground">
                Selected: {{ selectedRow.name }}
            </p>
        </section>

        <!-- DataView -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">DataView (Grid)</h2>
            <DataView :value="dataViewItems" layout="grid" :paginator="true" :rows="4">
                <template #grid="slotProps">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4">
                        <div
                            v-for="item in slotProps.items"
                            :key="item.id"
                            class="border rounded-lg p-3 flex flex-col gap-2"
                        >
                            <div class="font-semibold text-sm">{{ item.name }}</div>
                            <div class="text-xs text-muted-foreground">{{ item.category }}</div>
                            <div class="text-primary font-bold">${{ item.price }}</div>
                            <div class="flex gap-0.5">
                                <i v-for="s in item.rating" :key="s" class="pi pi-star-fill text-yellow-400 text-xs" />
                                <i v-for="s in 5 - item.rating" :key="'e' + s" class="pi pi-star text-surface-300 text-xs" />
                            </div>
                        </div>
                    </div>
                </template>
            </DataView>
        </section>

        <!-- Tree -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Tree</h2>
            <p class="text-sm text-muted-foreground">Hierarchical data with expand/collapse.</p>
            <Tree :value="treeNodes" class="w-full md:w-80" />
        </section>

        <!-- TreeTable -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">TreeTable</h2>
            <TreeTable :value="treeTableNodes" class="w-full">
                <Column field="name" header="Name" :expander="true" />
                <Column field="size" header="Size" />
                <Column field="type" header="Type" />
            </TreeTable>
        </section>

        <!-- Timeline -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Timeline</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-medium mb-3">Vertical</h3>
                    <Timeline :value="timelineEvents" align="left">
                        <template #marker="slotProps">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full text-white text-xs" :style="{ backgroundColor: slotProps.item.color }">
                                <i :class="slotProps.item.icon" />
                            </div>
                        </template>
                        <template #content="slotProps">
                            <div class="pb-4">
                                <div class="font-semibold">{{ slotProps.item.status }}</div>
                                <div class="text-sm text-muted-foreground">{{ slotProps.item.date }}</div>
                            </div>
                        </template>
                    </Timeline>
                </div>
                <div>
                    <h3 class="text-sm font-medium mb-3">Horizontal</h3>
                    <Timeline :value="timelineEvents" layout="horizontal" align="top">
                        <template #marker="slotProps">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full text-white text-xs" :style="{ backgroundColor: slotProps.item.color }">
                                <i :class="slotProps.item.icon" />
                            </div>
                        </template>
                        <template #content="slotProps">
                            <div class="text-sm">
                                <div class="font-semibold">{{ slotProps.item.status }}</div>
                            </div>
                        </template>
                    </Timeline>
                </div>
            </div>
        </section>

        <!-- Paginator -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Paginator</h2>
            <Paginator
                v-model:first="paginatorFirst"
                v-model:rows="paginatorRows"
                :total-records="50"
                :rows-per-page-options="[5, 10, 20]"
            />
            <p class="text-sm text-muted-foreground">Page {{ Math.floor(paginatorFirst / paginatorRows) + 1 }} of {{ Math.ceil(50 / paginatorRows) }} ({{ paginatorRows }} rows/page)</p>
        </section>
    </div>
</template>
