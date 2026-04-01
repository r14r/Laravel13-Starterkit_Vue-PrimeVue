<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Toast from 'primevue/toast';
import Message from 'primevue/message';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import InlineMessage from 'primevue/inlinemessage';
import { useToast } from 'primevue/usetoast';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Messages', href: '/primevue/messages' },
        ],
    }),
});

const toast = useToast();

function showToast(severity: 'success' | 'info' | 'warn' | 'error' | 'secondary' | 'contrast') {
    const messages = {
        success: { summary: 'Success', detail: 'Operation completed successfully.' },
        info: { summary: 'Info', detail: 'Here is some useful information.' },
        warn: { summary: 'Warning', detail: 'Please review your input.' },
        error: { summary: 'Error', detail: 'An error has occurred.' },
        secondary: { summary: 'Secondary', detail: 'A secondary notification.' },
        contrast: { summary: 'Contrast', detail: 'High-contrast notification.' },
    };
    toast.add({ severity, ...messages[severity], life: 3000 });
}

function showMultiple() {
    toast.add({ severity: 'info', summary: 'Message 1', detail: 'First message', life: 3000 });
    toast.add({ severity: 'success', summary: 'Message 2', detail: 'Second message', life: 3500 });
    toast.add({ severity: 'warn', summary: 'Message 3', detail: 'Third message', life: 4000 });
}

function showSticky() {
    toast.add({
        severity: 'warn',
        summary: 'Sticky Toast',
        detail: 'This toast must be manually closed (no auto-dismiss).',
    });
}

// Inline messages state
const closedMessages = ref(new Set<string>());
</script>

<template>
    <Head title="Messages & Notifications" />
    <Toast position="top-right" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Messages & Notifications</h1>
            <p class="text-muted-foreground">Toast, Message — for alerts, success, error, warning and info feedback.</p>
        </div>

        <!-- Toast Notifications -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Toast Notifications</h2>
            <p class="text-sm text-muted-foreground">Toast notifications appear in the top-right corner.</p>
            <div class="flex flex-wrap gap-3">
                <Button label="Success" icon="pi pi-check-circle" severity="success" @click="showToast('success')" />
                <Button label="Info" icon="pi pi-info-circle" severity="info" @click="showToast('info')" />
                <Button label="Warning" icon="pi pi-exclamation-triangle" severity="warn" @click="showToast('warn')" />
                <Button label="Error" icon="pi pi-times-circle" severity="danger" @click="showToast('error')" />
                <Button label="Multiple" icon="pi pi-list" severity="secondary" @click="showMultiple" />
                <Button label="Sticky" icon="pi pi-thumbtack" outlined @click="showSticky" />
            </div>
        </section>

        <!-- Toast Positions -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Toast — All Severities</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                <Toast position="top-left" group="tl" />
                <Toast position="top-center" group="tc" />
                <Toast position="bottom-left" group="bl" />
                <Toast position="bottom-center" group="bc" />
                <Toast position="bottom-right" group="br" />
                <Toast position="center" group="c" />
                <Button label="Top Left" @click="toast.add({ severity:'info', summary:'Top Left', detail:'Toast at top-left', group:'tl', life:3000 })" size="small" />
                <Button label="Top Center" severity="secondary" @click="toast.add({ severity:'success', summary:'Top Center', detail:'Toast at top-center', group:'tc', life:3000 })" size="small" />
                <Button label="Bottom Left" severity="success" @click="toast.add({ severity:'warn', summary:'Bottom Left', detail:'Toast at bottom-left', group:'bl', life:3000 })" size="small" />
                <Button label="Bottom Center" severity="warn" @click="toast.add({ severity:'info', summary:'Bottom Center', detail:'Toast at bottom-center', group:'bc', life:3000 })" size="small" />
                <Button label="Bottom Right" severity="danger" @click="toast.add({ severity:'error', summary:'Bottom Right', detail:'Toast at bottom-right', group:'br', life:3000 })" size="small" />
                <Button label="Center" outlined @click="toast.add({ severity:'info', summary:'Center', detail:'Toast in center', group:'c', life:3000 })" size="small" />
            </div>
        </section>

        <!-- Inline Messages -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Message (Inline)</h2>
            <div class="space-y-3">
                <Message severity="success">
                    <template #icon><i class="pi pi-check-circle" /></template>
                    Your account has been created successfully.
                </Message>
                <Message severity="info">
                    <template #icon><i class="pi pi-info-circle" /></template>
                    Your session will expire in 5 minutes.
                </Message>
                <Message severity="warn">
                    <template #icon><i class="pi pi-exclamation-triangle" /></template>
                    Please update your payment information before the next billing cycle.
                </Message>
                <Message severity="error">
                    <template #icon><i class="pi pi-times-circle" /></template>
                    Failed to save changes. Please try again.
                </Message>
                <Message severity="secondary">
                    A neutral secondary message for general notifications.
                </Message>
                <Message severity="contrast">
                    High-contrast message for important system notices.
                </Message>
            </div>
        </section>

        <!-- Closable Messages -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Closable Messages</h2>
            <div class="space-y-3">
                <Message v-if="!closedMessages.has('success')" severity="success" :closable="true" @close="closedMessages.add('success')">
                    This message can be dismissed by clicking ×
                </Message>
                <Message v-if="!closedMessages.has('info')" severity="info" :closable="true" @close="closedMessages.add('info')">
                    Another closable information message.
                </Message>
                <Message v-if="!closedMessages.has('warn')" severity="warn" :closable="true" @close="closedMessages.add('warn')">
                    Closable warning message.
                </Message>
                <div v-if="closedMessages.size > 0">
                    <Button
                        label="Reset messages"
                        severity="secondary"
                        size="small"
                        icon="pi pi-refresh"
                        @click="closedMessages.clear()"
                    />
                </div>
            </div>
        </section>

        <!-- InlineMessage -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">InlineMessage</h2>
            <p class="text-sm text-muted-foreground">Compact inline message component for showing short status messages.</p>
            <div class="flex flex-wrap gap-3">
                <InlineMessage severity="info">Info message</InlineMessage>
                <InlineMessage severity="success">Operation completed successfully</InlineMessage>
                <InlineMessage severity="warn">This field is required</InlineMessage>
                <InlineMessage severity="error">Invalid email address</InlineMessage>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="space-y-2">
                    <label class="text-sm font-medium">Field Validation Example</label>
                    <div class="flex flex-col gap-1">
                        <InputText placeholder="Email address" invalid class="w-full" />
                        <InlineMessage severity="error">Please enter a valid email address</InlineMessage>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium">Icon Only</label>
                    <div class="flex gap-2">
                        <InlineMessage severity="info" />
                        <InlineMessage severity="success" />
                        <InlineMessage severity="warn" />
                        <InlineMessage severity="error" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
