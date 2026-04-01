<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Card from 'primevue/card';
import Tag from 'primevue/tag';
import Badge from 'primevue/badge';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
        ],
    }),
});

const categories = [
    {
        title: 'Form Components',
        description: 'InputText, Textarea, InputNumber, Select, MultiSelect, Checkbox, RadioButton, ToggleSwitch, Slider, Rating, Password, ColorPicker and more.',
        href: '/primevue/form',
        icon: 'pi pi-pencil',
        tag: '20+ components',
        severity: 'info',
    },
    {
        title: 'Button Components',
        description: 'Button, SplitButton, SpeedDial with all variants: severity, size, outlined, text, raised, rounded, icon-only.',
        href: '/primevue/buttons',
        icon: 'pi pi-stop-circle',
        tag: '3 components',
        severity: 'success',
    },
    {
        title: 'Data Components',
        description: 'DataTable (sorting, filtering, pagination, row expand, selection), Tree, TreeTable, DataView, Timeline and more.',
        href: '/primevue/data',
        icon: 'pi pi-table',
        tag: '8 components',
        severity: 'warn',
    },
    {
        title: 'Panel Components',
        description: 'Card, Accordion, Panel, TabView, Toolbar, Divider, Fieldset, ScrollPanel, Splitter, Stepper.',
        href: '/primevue/panels',
        icon: 'pi pi-th-large',
        tag: '10 components',
        severity: 'info',
    },
    {
        title: 'Overlay Components',
        description: 'Dialog, ConfirmDialog, DynamicDialog, Drawer, Popover, Tooltip, ConfirmPopup.',
        href: '/primevue/overlay',
        icon: 'pi pi-clone',
        tag: '7 components',
        severity: 'secondary',
    },
    {
        title: 'Messages & Notifications',
        description: 'Toast, Message, InlineMessage — for alerts, success, error, warning and info feedback.',
        href: '/primevue/messages',
        icon: 'pi pi-bell',
        tag: '3 components',
        severity: 'danger',
    },
    {
        title: 'Media & Display',
        description: 'Image (zoom/preview), Galleria, Carousel, Avatar, Chip, Tag, Badge, ProgressBar, ProgressSpinner, Skeleton.',
        href: '/primevue/media',
        icon: 'pi pi-images',
        tag: '10 components',
        severity: 'contrast',
    },
    {
        title: 'Navigation',
        description: 'Menu, Menubar, MegaMenu, PanelMenu, TieredMenu, Breadcrumb, Steps, TabMenu, Dock.',
        href: '/primevue/navigation',
        icon: 'pi pi-bars',
        tag: '9 components',
        severity: 'info',
    },
    {
        title: 'Charts',
        description: 'Bar chart, Line chart, Pie chart, Doughnut chart, Polar Area chart, Radar chart.',
        href: '/primevue/charts',
        icon: 'pi pi-chart-bar',
        tag: '6 chart types',
        severity: 'success',
    },
    {
        title: 'Misc Components',
        description: 'VirtualScroller, ScrollTop, Terminal, Inplace, BlockUI, ContextMenu, Knob, ToggleButton.',
        href: '/primevue/misc',
        icon: 'pi pi-cog',
        tag: '8 components',
        severity: 'warn',
    },
];
</script>

<template>
    <Head title="PrimeVue Components" />

    <div class="p-6 space-y-6">
        <!-- Header -->
        <div class="text-center py-8">
            <div class="flex items-center justify-center gap-3 mb-4">
                <i class="pi pi-prime text-5xl text-primary" />
                <h1 class="text-4xl font-bold">PrimeVue Components</h1>
            </div>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                A comprehensive showcase of PrimeVue v4 components integrated into this Laravel 13 + Inertia.js + Vue 3 starter kit.
            </p>
            <div class="flex items-center justify-center gap-2 mt-4">
                <Badge value="PrimeVue v4" severity="info" />
                <Badge value="80+ Components" severity="success" />
                <Badge value="Aura Theme" severity="secondary" />
            </div>
        </div>

        <!-- Component Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Link
                v-for="cat in categories"
                :key="cat.href"
                :href="cat.href"
                class="block no-underline"
            >
                <Card class="h-full hover:shadow-lg transition-shadow cursor-pointer border border-surface-200 dark:border-surface-700">
                    <template #header>
                        <div class="px-5 pt-5 pb-0">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                        <i :class="[cat.icon, 'text-primary text-xl']" />
                                    </div>
                                    <h3 class="text-lg font-semibold">{{ cat.title }}</h3>
                                </div>
                                <Tag :value="cat.tag" :severity="cat.severity" rounded />
                            </div>
                        </div>
                    </template>
                    <template #content>
                        <p class="text-sm text-muted-foreground">{{ cat.description }}</p>
                    </template>
                    <template #footer>
                        <div class="flex items-center text-primary text-sm font-medium gap-1">
                            <span>Explore components</span>
                            <i class="pi pi-arrow-right text-xs" />
                        </div>
                    </template>
                </Card>
            </Link>
        </div>

        <!-- Quick Info -->
        <Card class="bg-surface-50 dark:bg-surface-800">
            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="text-3xl font-bold text-primary mb-1">80+</div>
                        <div class="text-sm text-muted-foreground">UI Components</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-primary mb-1">Aura</div>
                        <div class="text-sm text-muted-foreground">Design System</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-primary mb-1">Dark</div>
                        <div class="text-sm text-muted-foreground">Mode Support</div>
                    </div>
                </div>
            </template>
        </Card>
    </div>
</template>
