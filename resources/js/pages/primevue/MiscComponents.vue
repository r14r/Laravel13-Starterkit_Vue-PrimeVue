<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import VirtualScroller from 'primevue/virtualscroller';
import Terminal from 'primevue/terminal';
import TerminalService from 'primevue/terminalservice';
import BlockUI from 'primevue/blockui';
import Knob from 'primevue/knob';
import ToggleButton from 'primevue/togglebutton';
import ContextMenu from 'primevue/contextmenu';
import Button from 'primevue/button';
import Card from 'primevue/card';
import type { MenuItem } from 'primevue/menuitem';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Misc Components', href: '/primevue/misc' },
        ],
    }),
});

// VirtualScroller
const vsItems = Array.from({ length: 1000 }, (_, i) => ({
    label: `Item #${i + 1}`,
    value: i,
}));

// BlockUI
const blocked = ref(false);
function toggleBlock() {
    blocked.value = !blocked.value;
    if (blocked.value) {
        setTimeout(() => (blocked.value = false), 3000);
    }
}

// Knob examples
const knobValue1 = ref(60);
const knobValue2 = ref(40);
const knobValue3 = ref(80);

// ToggleButton examples
const toggle1 = ref(false);
const toggle2 = ref(true);
const toggle3 = ref(false);

// ContextMenu
const cmRef = ref();
const contextMenuItems = ref<MenuItem[]>([
    { label: 'View', icon: 'pi pi-fw pi-eye' },
    { label: 'Edit', icon: 'pi pi-fw pi-pencil' },
    { separator: true },
    { label: 'Copy', icon: 'pi pi-fw pi-copy' },
    { label: 'Delete', icon: 'pi pi-fw pi-trash' },
]);

// Terminal
function commandHandler(text: string) {
    let response = '';
    const argsIndex = text.indexOf(' ');
    const command = argsIndex !== -1 ? text.substring(0, argsIndex) : text;

    switch (command) {
        case 'date':
            response = new Date().toDateString();
            break;
        case 'greet':
            response = `Hello, ${text.substring(argsIndex + 1)}!`;
            break;
        case 'whoami':
            response = 'guest@primevue-demo';
            break;
        case 'help':
            response = 'Available commands: date, greet [name], whoami, clear, help';
            break;
        default:
            response = `Command not found: ${command}. Type 'help' for available commands.`;
    }

    TerminalService.emit('response', response);
}
</script>

<template>
    <Head title="Misc Components" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Miscellaneous Components</h1>
            <p class="text-muted-foreground">VirtualScroller, Terminal, BlockUI, Knob, ToggleButton, ContextMenu.</p>
        </div>

        <!-- VirtualScroller -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">VirtualScroller</h2>
            <p class="text-sm text-muted-foreground">Renders 1,000 items efficiently — only visible rows are in the DOM.</p>
            <VirtualScroller :items="vsItems" :item-size="40" style="height: 200px; border: 1px solid var(--p-surface-200); border-radius: 8px;">
                <template #item="{ item, options }">
                    <div
                        class="flex items-center px-4 text-sm"
                        :class="{ 'bg-surface-50 dark:bg-surface-800': options.odd }"
                        style="height: 40px"
                    >
                        <i class="pi pi-tag mr-3 text-primary text-xs" />
                        {{ item.label }}
                    </div>
                </template>
            </VirtualScroller>
        </section>

        <!-- BlockUI -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">BlockUI</h2>
            <p class="text-sm text-muted-foreground">Click "Block" to lock the panel for 3 seconds.</p>
            <BlockUI :blocked="blocked">
                <Card>
                    <template #content>
                        <div class="space-y-2 text-sm">
                            <p>This content can be blocked by the BlockUI component.</p>
                            <p>When blocked, user interaction is prevented.</p>
                            <p>Useful for showing loading state on a specific section.</p>
                        </div>
                    </template>
                </Card>
            </BlockUI>
            <Button :label="blocked ? 'Blocked (3s)...' : 'Block Panel'" :disabled="blocked" @click="toggleBlock" icon="pi pi-lock" />
        </section>

        <!-- Knob -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Knob (Interactive Dial)</h2>
            <div class="flex flex-wrap gap-8">
                <div class="flex flex-col items-center gap-2">
                    <Knob v-model="knobValue1" />
                    <span class="text-sm text-muted-foreground">Volume</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <Knob v-model="knobValue2" :stroke-width="8" value-color="#22c55e" range-color="#dcfce7" />
                    <span class="text-sm text-muted-foreground">Battery</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <Knob v-model="knobValue3" :step="10" value-color="#f59e0b" range-color="#fef3c7" suffix="%" />
                    <span class="text-sm text-muted-foreground">Brightness</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <Knob :model-value="75" read-only />
                    <span class="text-sm text-muted-foreground">Read-only</span>
                </div>
            </div>
        </section>

        <!-- ToggleButton -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ToggleButton</h2>
            <div class="flex flex-wrap gap-6 items-center">
                <div class="flex flex-col items-center gap-2">
                    <ToggleButton v-model="toggle1" on-label="Yes" off-label="No" on-icon="pi pi-check" off-icon="pi pi-times" />
                    <span class="text-xs text-muted-foreground">Basic</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <ToggleButton v-model="toggle2" on-label="Enabled" off-label="Disabled" on-icon="pi pi-lock-open" off-icon="pi pi-lock" />
                    <span class="text-xs text-muted-foreground">Lock</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <ToggleButton v-model="toggle3" on-label="Liked" off-label="Like" on-icon="pi pi-heart-fill" off-icon="pi pi-heart" />
                    <span class="text-xs text-muted-foreground">Like</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <ToggleButton :model-value="true" on-label="Active" off-label="Inactive" disabled />
                    <span class="text-xs text-muted-foreground">Disabled</span>
                </div>
            </div>
        </section>

        <!-- ContextMenu -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ContextMenu</h2>
            <p class="text-sm text-muted-foreground">Right-click on the area below to open the context menu.</p>
            <div
                class="border-2 border-dashed border-surface-300 dark:border-surface-600 rounded-lg p-8 text-center text-muted-foreground text-sm cursor-context-menu"
                @contextmenu="(e) => { e.preventDefault(); cmRef.show(e); }"
            >
                <i class="pi pi-mouse text-2xl mb-2 block" />
                Right-click here for context menu
            </div>
            <ContextMenu ref="cmRef" :model="contextMenuItems" />
        </section>

        <!-- Terminal -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Terminal</h2>
            <p class="text-sm text-muted-foreground">
                Type commands: <code class="bg-surface-100 dark:bg-surface-800 px-1 rounded text-xs">date</code>,
                <code class="bg-surface-100 dark:bg-surface-800 px-1 rounded text-xs">greet [name]</code>,
                <code class="bg-surface-100 dark:bg-surface-800 px-1 rounded text-xs">whoami</code>,
                <code class="bg-surface-100 dark:bg-surface-800 px-1 rounded text-xs">help</code>
            </p>
            <Terminal
                welcome-message="Welcome to PrimeVue Terminal. Type 'help' for available commands."
                prompt="guest@demo:~$ "
                @command="commandHandler"
                class="rounded-lg"
            />
        </section>
    </div>
</template>
