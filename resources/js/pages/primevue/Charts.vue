<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Chart from 'primevue/chart';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Charts', href: '/primevue/charts' },
        ],
    }),
});

// Bar Chart
const barData = ref({
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
        {
            label: 'Sales 2024',
            backgroundColor: '#6366f1',
            data: [65, 59, 80, 81, 56, 55, 40],
        },
        {
            label: 'Sales 2023',
            backgroundColor: '#a5b4fc',
            data: [28, 48, 40, 19, 86, 27, 90],
        },
    ],
});

// Line Chart
const lineData = ref({
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    datasets: [
        {
            label: 'Revenue',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: '#6366f1',
            tension: 0.4,
        },
        {
            label: 'Expenses',
            data: [28, 48, 40, 19, 86, 27, 90],
            fill: false,
            borderColor: '#f59e0b',
            tension: 0.4,
        },
    ],
});

// Pie Chart
const pieData = ref({
    labels: ['Electronics', 'Clothing', 'Accessories', 'Fitness', 'Other'],
    datasets: [
        {
            data: [300, 50, 100, 80, 45],
            backgroundColor: ['#6366f1', '#22c55e', '#f59e0b', '#3b82f6', '#ef4444'],
            hoverBackgroundColor: ['#4f46e5', '#16a34a', '#d97706', '#2563eb', '#dc2626'],
        },
    ],
});

// Doughnut Chart
const doughnutData = ref({
    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
    datasets: [
        {
            data: [540, 325, 702, 421],
            backgroundColor: ['#6366f1', '#22c55e', '#f59e0b', '#ef4444'],
        },
    ],
});

// Polar Area Chart
const polarData = ref({
    datasets: [
        {
            data: [11, 16, 7, 3, 14],
            backgroundColor: ['#6366f1', '#22c55e', '#f59e0b', '#ef4444', '#8b5cf6'],
        },
    ],
    labels: ['Red', 'Green', 'Yellow', 'Grey', 'Purple'],
});

// Radar Chart
const radarData = ref({
    labels: ['Speed', 'Strength', 'Intelligence', 'Endurance', 'Agility', 'Precision'],
    datasets: [
        {
            label: 'Hero A',
            backgroundColor: 'rgba(99, 102, 241, 0.2)',
            borderColor: '#6366f1',
            pointBackgroundColor: '#6366f1',
            data: [65, 59, 90, 81, 56, 55],
        },
        {
            label: 'Hero B',
            backgroundColor: 'rgba(245, 158, 11, 0.2)',
            borderColor: '#f59e0b',
            pointBackgroundColor: '#f59e0b',
            data: [28, 80, 40, 19, 96, 27],
        },
    ],
});

const chartOptions = ref({
    plugins: { legend: { position: 'bottom' } },
    responsive: true,
    maintainAspectRatio: false,
});

const pieOptions = ref({
    plugins: { legend: { position: 'bottom' } },
    responsive: true,
    maintainAspectRatio: false,
});
</script>

<template>
    <Head title="Charts" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Charts</h1>
            <p class="text-muted-foreground">PrimeVue Chart component powered by Chart.js — Bar, Line, Pie, Doughnut, Polar Area, Radar.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bar Chart -->
            <div class="border rounded-lg p-4 space-y-2">
                <h2 class="text-lg font-semibold">Bar Chart</h2>
                <div style="height: 260px">
                    <Chart type="bar" :data="barData" :options="chartOptions" class="h-full" />
                </div>
            </div>

            <!-- Line Chart -->
            <div class="border rounded-lg p-4 space-y-2">
                <h2 class="text-lg font-semibold">Line Chart</h2>
                <div style="height: 260px">
                    <Chart type="line" :data="lineData" :options="chartOptions" class="h-full" />
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="border rounded-lg p-4 space-y-2">
                <h2 class="text-lg font-semibold">Pie Chart</h2>
                <div style="height: 260px">
                    <Chart type="pie" :data="pieData" :options="pieOptions" class="h-full" />
                </div>
            </div>

            <!-- Doughnut Chart -->
            <div class="border rounded-lg p-4 space-y-2">
                <h2 class="text-lg font-semibold">Doughnut Chart</h2>
                <div style="height: 260px">
                    <Chart type="doughnut" :data="doughnutData" :options="pieOptions" class="h-full" />
                </div>
            </div>

            <!-- Polar Area Chart -->
            <div class="border rounded-lg p-4 space-y-2">
                <h2 class="text-lg font-semibold">Polar Area Chart</h2>
                <div style="height: 260px">
                    <Chart type="polarArea" :data="polarData" :options="pieOptions" class="h-full" />
                </div>
            </div>

            <!-- Radar Chart -->
            <div class="border rounded-lg p-4 space-y-2">
                <h2 class="text-lg font-semibold">Radar Chart</h2>
                <div style="height: 260px">
                    <Chart type="radar" :data="radarData" :options="chartOptions" class="h-full" />
                </div>
            </div>
        </div>
    </div>
</template>
