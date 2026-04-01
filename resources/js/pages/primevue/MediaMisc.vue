<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Avatar from 'primevue/avatar';
import AvatarGroup from 'primevue/avatargroup';
import Badge from 'primevue/badge';
import Tag from 'primevue/tag';
import Chip from 'primevue/chip';
import ProgressBar from 'primevue/progressbar';
import ProgressSpinner from 'primevue/progressspinner';
import Skeleton from 'primevue/skeleton';
import Image from 'primevue/image';
import Carousel from 'primevue/carousel';
import Galleria from 'primevue/galleria';
import ScrollTop from 'primevue/scrolltop';
import Inplace from 'primevue/inplace';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import ImageCompare from 'primevue/imagecompare';
import AnimateOnScroll from 'primevue/animateonscroll';

const vAnimateonscroll = AnimateOnScroll;

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Media & Display', href: '/primevue/media' },
        ],
    }),
});

const progressValue = ref(65);
const progressAnim = ref(0);
const interval = ref<ReturnType<typeof setInterval> | null>(null);

function startProgress() {
    if (interval.value) return;
    progressAnim.value = 0;
    interval.value = setInterval(() => {
        progressAnim.value += 10;
        if (progressAnim.value >= 100) {
            clearInterval(interval.value!);
            interval.value = null;
        }
    }, 300);
}

// Carousel items
const carouselProducts = ref([
    { id: 1, name: 'Bamboo Watch', price: '$65', category: 'Accessories', color: '#A78BFA' },
    { id: 2, name: 'Blue Band', price: '$79', category: 'Fitness', color: '#60A5FA' },
    { id: 3, name: 'Galaxy Earrings', price: '$34', category: 'Accessories', color: '#34D399' },
    { id: 4, name: 'Game Controller', price: '$99', category: 'Electronics', color: '#F87171' },
    { id: 5, name: 'Gold Phone Case', price: '$24', category: 'Accessories', color: '#FBBF24' },
    { id: 6, name: 'Green Earbuds', price: '$89', category: 'Electronics', color: '#6EE7B7' },
]);

// Galleria
const galleriaImages = ref([
    { itemImageSrc: 'https://picsum.photos/seed/g1/800/500', thumbnailImageSrc: 'https://picsum.photos/seed/g1/150/100', alt: 'Photo 1', title: 'City at Dusk' },
    { itemImageSrc: 'https://picsum.photos/seed/g2/800/500', thumbnailImageSrc: 'https://picsum.photos/seed/g2/150/100', alt: 'Photo 2', title: 'Mountain View' },
    { itemImageSrc: 'https://picsum.photos/seed/g3/800/500', thumbnailImageSrc: 'https://picsum.photos/seed/g3/150/100', alt: 'Photo 3', title: 'Ocean Waves' },
    { itemImageSrc: 'https://picsum.photos/seed/g4/800/500', thumbnailImageSrc: 'https://picsum.photos/seed/g4/150/100', alt: 'Photo 4', title: 'Forest Path' },
]);
</script>

<template>
    <Head title="Media & Display" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Media & Display Components</h1>
            <p class="text-muted-foreground">Avatar, Badge, Tag, Chip, Image, Galleria, Carousel, ProgressBar, ProgressSpinner, Skeleton, Inplace, ScrollTop.</p>
        </div>

        <!-- Avatar & AvatarGroup -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Avatar & AvatarGroup</h2>
            <div class="flex flex-wrap gap-6 items-center">
                <div class="flex flex-col items-center gap-1">
                    <Avatar label="P" size="xlarge" shape="circle" />
                    <span class="text-xs">Label XL</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <Avatar label="P" size="large" shape="circle" />
                    <span class="text-xs">Label L</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <Avatar label="P" shape="circle" />
                    <span class="text-xs">Label</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <Avatar icon="pi pi-user" shape="circle" size="large" />
                    <span class="text-xs">Icon</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <Avatar image="https://i.pravatar.cc/48?img=1" shape="circle" size="large" />
                    <span class="text-xs">Image</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <AvatarGroup>
                        <Avatar image="https://i.pravatar.cc/32?img=1" shape="circle" />
                        <Avatar image="https://i.pravatar.cc/32?img=2" shape="circle" />
                        <Avatar image="https://i.pravatar.cc/32?img=3" shape="circle" />
                        <Avatar label="+2" shape="circle" style="background-color: #9c27b0; color: #fff" />
                    </AvatarGroup>
                    <span class="text-xs">Group</span>
                </div>
            </div>
        </section>

        <!-- Badge -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Badge</h2>
            <div class="flex flex-wrap gap-4 items-center">
                <Badge value="2" />
                <Badge value="8" severity="secondary" />
                <Badge value="4" severity="success" />
                <Badge value="12" severity="info" />
                <Badge value="3" severity="warn" />
                <Badge value="!" severity="danger" />
                <div class="inline-flex relative">
                    <Button icon="pi pi-bell" rounded severity="secondary" />
                    <Badge value="5" class="absolute -top-1 -right-1" />
                </div>
                <div class="inline-flex relative">
                    <Avatar icon="pi pi-user" shape="circle" size="large" />
                    <Badge value="" severity="success" class="absolute bottom-0 right-0 w-3 h-3 min-w-0" />
                </div>
            </div>
        </section>

        <!-- Tag -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Tag</h2>
            <div class="flex flex-wrap gap-3 items-center">
                <Tag value="New" />
                <Tag value="Confirmed" severity="success" />
                <Tag value="In Progress" severity="info" />
                <Tag value="Review" severity="warn" />
                <Tag value="Rejected" severity="danger" />
                <Tag value="Archived" severity="secondary" />
                <Tag value="Default" severity="contrast" />
                <Tag value="Rounded" rounded />
                <Tag value="With Icon" icon="pi pi-check" severity="success" rounded />
            </div>
        </section>

        <!-- Chip -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Chip</h2>
            <div class="flex flex-wrap gap-3 items-center">
                <Chip label="Vue" />
                <Chip label="React" icon="pi pi-bolt" />
                <Chip label="John Doe" image="https://i.pravatar.cc/32?img=4" removable />
                <Chip label="Removable" removable />
                <Chip label="Action" icon="pi pi-plus" class="cursor-pointer" />
            </div>
        </section>

        <!-- ProgressBar -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ProgressBar</h2>
            <div class="space-y-4">
                <div>
                    <label class="text-sm text-muted-foreground">Determinate: {{ progressValue }}%</label>
                    <ProgressBar :value="progressValue" class="mt-1" />
                </div>
                <div>
                    <label class="text-sm text-muted-foreground">Animated demo (click Start):</label>
                    <ProgressBar :value="progressAnim" class="mt-1" />
                    <Button label="Start" size="small" class="mt-2" @click="startProgress" />
                </div>
                <div>
                    <label class="text-sm text-muted-foreground">Indeterminate (loading)</label>
                    <ProgressBar mode="indeterminate" class="mt-1" style="height: 6px" />
                </div>
            </div>
        </section>

        <!-- ProgressSpinner -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ProgressSpinner</h2>
            <div class="flex flex-wrap gap-6 items-center">
                <div class="flex flex-col items-center gap-2">
                    <ProgressSpinner />
                    <span class="text-xs">Default</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <ProgressSpinner style="width: 40px; height: 40px" stroke-width="6" animation-duration=".5s" />
                    <span class="text-xs">Small Fast</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <ProgressSpinner style="width: 80px; height: 80px" stroke-width="2" fill="transparent" animation-duration="2s" />
                    <span class="text-xs">Large Slow</span>
                </div>
            </div>
        </section>

        <!-- Skeleton -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Skeleton (Loading Placeholder)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="border rounded-lg p-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <Skeleton shape="circle" size="3rem" />
                        <div class="flex-1 space-y-2">
                            <Skeleton width="60%" height="1rem" />
                            <Skeleton width="40%" height="0.75rem" />
                        </div>
                    </div>
                    <Skeleton height="4rem" />
                    <div class="flex gap-2">
                        <Skeleton width="30%" height="2rem" border-radius="6px" />
                        <Skeleton width="30%" height="2rem" border-radius="6px" />
                    </div>
                </div>
                <div class="border rounded-lg p-4 space-y-2">
                    <Skeleton height="1rem" class="mb-3" />
                    <Skeleton v-for="i in 5" :key="i" height="0.75rem" :width="(100 - i * 8) + '%'" />
                </div>
            </div>
        </section>

        <!-- Image -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Image (with Preview)</h2>
            <div class="flex flex-wrap gap-4">
                <div class="flex flex-col items-center gap-2">
                    <Image src="https://picsum.photos/seed/img1/200/150" alt="Preview 1" width="200" preview />
                    <span class="text-xs text-muted-foreground">Click to preview</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <Image src="https://picsum.photos/seed/img2/200/150" alt="Preview 2" width="200" preview />
                    <span class="text-xs text-muted-foreground">Click to preview</span>
                </div>
            </div>
        </section>

        <!-- Carousel -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Carousel</h2>
            <Carousel :value="carouselProducts" :num-visible="3" :num-scroll="1" circular :auto-play-interval="4000">
                <template #item="slotProps">
                    <div class="border rounded-lg p-4 mx-2 text-center space-y-2">
                        <div class="h-16 rounded-lg flex items-center justify-center text-2xl font-bold text-white" :style="{ backgroundColor: slotProps.data.color }">
                            {{ slotProps.data.name.charAt(0) }}
                        </div>
                        <div class="font-semibold text-sm">{{ slotProps.data.name }}</div>
                        <div class="text-xs text-muted-foreground">{{ slotProps.data.category }}</div>
                        <div class="text-primary font-bold">{{ slotProps.data.price }}</div>
                        <Button label="Buy" size="small" class="w-full" />
                    </div>
                </template>
            </Carousel>
        </section>

        <!-- Galleria -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Galleria</h2>
            <Galleria
                :value="galleriaImages"
                :num-visible="4"
                :show-thumbnails="true"
                :circular="true"
                style="max-width: 640px"
            >
                <template #item="slotProps">
                    <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" class="w-full h-60 object-cover rounded-lg" />
                </template>
                <template #thumbnail="slotProps">
                    <img :src="slotProps.item.thumbnailImageSrc" :alt="slotProps.item.alt" class="h-16 w-24 object-cover rounded" />
                </template>
                <template #caption="slotProps">
                    <div class="text-center py-2 text-sm font-medium">{{ slotProps.item.title }}</div>
                </template>
            </Galleria>
        </section>

        <!-- Inplace -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Inplace (Click-to-Edit)</h2>
            <Inplace>
                <template #display>
                    <span class="inline-flex items-center gap-1 text-sm cursor-pointer hover:text-primary">
                        <i class="pi pi-pencil text-xs" />
                        Click here to edit this text inline
                    </span>
                </template>
                <template #content="{ closeCallback }">
                    <div class="flex items-center gap-2">
                        <InputText default-value="Editable text here" class="text-sm" />
                        <Button icon="pi pi-check" size="small" @click="closeCallback" />
                    </div>
                </template>
            </Inplace>
        </section>

        <!-- ScrollTop -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ScrollTop</h2>
            <p class="text-sm text-muted-foreground">A "scroll to top" button appears when you scroll down enough.</p>
            <ScrollTop />
        </section>

        <!-- ImageCompare -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ImageCompare</h2>
            <p class="text-sm text-muted-foreground">Drag the slider to compare two images side by side.</p>
            <div class="max-w-md">
                <ImageCompare>
                    <template #left>
                        <img
                            src="https://primefaces.org/cdn/primevue/images/nature/nature1.jpg"
                            alt="Before"
                            class="w-full"
                            style="max-height: 250px; object-fit: cover;"
                        />
                    </template>
                    <template #right>
                        <img
                            src="https://primefaces.org/cdn/primevue/images/nature/nature2.jpg"
                            alt="After"
                            class="w-full"
                            style="max-height: 250px; object-fit: cover;"
                        />
                    </template>
                </ImageCompare>
            </div>
        </section>

        <!-- AnimateOnScroll -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">AnimateOnScroll</h2>
            <p class="text-sm text-muted-foreground">Elements animate when they enter the viewport. Uses the <code class="text-xs bg-surface-100 dark:bg-surface-800 px-1 rounded">v-animateonscroll</code> directive.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div
                    v-animateonscroll="{ enterClass: 'animate-fadein', leaveClass: 'animate-fadeout' }"
                    class="border rounded-lg p-4 text-center bg-surface-50 dark:bg-surface-800"
                >
                    <i class="pi pi-star text-3xl text-yellow-400 mb-2 block" />
                    <p class="font-semibold">Fade In</p>
                </div>
                <div
                    v-animateonscroll="{ enterClass: 'animate-slidein', leaveClass: 'animate-slideout' }"
                    class="border rounded-lg p-4 text-center bg-surface-50 dark:bg-surface-800"
                >
                    <i class="pi pi-heart text-3xl text-red-400 mb-2 block" />
                    <p class="font-semibold">Slide In</p>
                </div>
                <div
                    v-animateonscroll="{ enterClass: 'animate-zoomin', leaveClass: 'animate-zoomout' }"
                    class="border rounded-lg p-4 text-center bg-surface-50 dark:bg-surface-800"
                >
                    <i class="pi pi-bolt text-3xl text-blue-400 mb-2 block" />
                    <p class="font-semibold">Zoom In</p>
                </div>
            </div>
        </section>
    </div>
</template>
