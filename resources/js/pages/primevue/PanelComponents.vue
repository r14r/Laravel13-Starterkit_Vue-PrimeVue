<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Card from 'primevue/card';
import Panel from 'primevue/panel';
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import Toolbar from 'primevue/toolbar';
import Divider from 'primevue/divider';
import Fieldset from 'primevue/fieldset';
import ScrollPanel from 'primevue/scrollpanel';
import Splitter from 'primevue/splitter';
import SplitterPanel from 'primevue/splitterpanel';
import Stepper from 'primevue/stepper';
import StepList from 'primevue/steplist';
import Step from 'primevue/step';
import StepPanels from 'primevue/steppanels';
import StepPanel from 'primevue/steppanel';
import Button from 'primevue/button';
import Tag from 'primevue/tag';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Panel Components', href: '/primevue/panels' },
        ],
    }),
});

const activeStep = ref('0');
</script>

<template>
    <Head title="Panel Components" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Panel Components</h1>
            <p class="text-muted-foreground">Card, Panel, Accordion, Tabs, Toolbar, Divider, Fieldset, ScrollPanel, Splitter, Stepper.</p>
        </div>

        <!-- Card -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Card</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <Card>
                    <template #title>Simple Card</template>
                    <template #content>
                        <p class="text-sm">A basic card with title and content slots.</p>
                    </template>
                </Card>
                <Card>
                    <template #header>
                        <div class="h-32 bg-gradient-to-br from-primary/30 to-primary/10 flex items-center justify-center rounded-t-lg">
                            <i class="pi pi-image text-4xl text-primary" />
                        </div>
                    </template>
                    <template #title>Card with Image</template>
                    <template #subtitle>Card subtitle</template>
                    <template #content>
                        <p class="text-sm">Card with header image area and subtitle.</p>
                    </template>
                    <template #footer>
                        <div class="flex justify-end gap-2">
                            <Button label="Cancel" severity="secondary" outlined />
                            <Button label="Action" />
                        </div>
                    </template>
                </Card>
                <Card class="overflow-hidden">
                    <template #title>
                        <div class="flex items-center justify-between">
                            <span>Product Card</span>
                            <Tag value="NEW" severity="success" />
                        </div>
                    </template>
                    <template #content>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span>Category</span>
                                <span class="font-medium">Electronics</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span>Price</span>
                                <span class="font-bold text-primary">$299.00</span>
                            </div>
                        </div>
                    </template>
                    <template #footer>
                        <Button label="Add to Cart" icon="pi pi-shopping-cart" class="w-full" />
                    </template>
                </Card>
            </div>
        </section>

        <!-- Panel -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Panel</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <Panel header="Panel Header">
                    <p class="text-sm">This is a basic Panel component. It supports a header slot.</p>
                </Panel>
                <Panel header="Collapsible Panel" :toggleable="true">
                    <p class="text-sm">This panel can be collapsed/expanded by clicking the toggle button in the header.</p>
                </Panel>
            </div>
        </section>

        <!-- Accordion -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Accordion</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium mb-2">Single open</h3>
                    <Accordion value="0">
                        <AccordionPanel value="0">
                            <AccordionHeader>What is PrimeVue?</AccordionHeader>
                            <AccordionContent>
                                <p class="text-sm">PrimeVue is a feature-rich UI component library for Vue.js. It provides 80+ components that you can use to build web applications quickly.</p>
                            </AccordionContent>
                        </AccordionPanel>
                        <AccordionPanel value="1">
                            <AccordionHeader>How to install PrimeVue?</AccordionHeader>
                            <AccordionContent>
                                <p class="text-sm">Install via npm: <code class="bg-surface-100 dark:bg-surface-800 px-1 rounded">npm install primevue primeicons</code> then configure in your main app file.</p>
                            </AccordionContent>
                        </AccordionPanel>
                        <AccordionPanel value="2">
                            <AccordionHeader>Does it support dark mode?</AccordionHeader>
                            <AccordionContent>
                                <p class="text-sm">Yes! PrimeVue supports dark mode via the <code class="bg-surface-100 dark:bg-surface-800 px-1 rounded">darkModeSelector</code> configuration option.</p>
                            </AccordionContent>
                        </AccordionPanel>
                    </Accordion>
                </div>
                <div>
                    <h3 class="text-sm font-medium mb-2">Multiple open</h3>
                    <Accordion :multiple="true" :value="['0']">
                        <AccordionPanel value="0">
                            <AccordionHeader>Section 1</AccordionHeader>
                            <AccordionContent>
                                <p class="text-sm">Content of the first accordion section.</p>
                            </AccordionContent>
                        </AccordionPanel>
                        <AccordionPanel value="1">
                            <AccordionHeader>Section 2</AccordionHeader>
                            <AccordionContent>
                                <p class="text-sm">Content of the second accordion section. Multiple sections can be open simultaneously.</p>
                            </AccordionContent>
                        </AccordionPanel>
                        <AccordionPanel value="2">
                            <AccordionHeader>Section 3</AccordionHeader>
                            <AccordionContent>
                                <p class="text-sm">Content of the third accordion section.</p>
                            </AccordionContent>
                        </AccordionPanel>
                    </Accordion>
                </div>
            </div>
        </section>

        <!-- Tabs (new API) -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Tabs</h2>
            <Tabs value="0">
                <TabList>
                    <Tab value="0"><i class="pi pi-home mr-2" />Home</Tab>
                    <Tab value="1"><i class="pi pi-chart-bar mr-2" />Reports</Tab>
                    <Tab value="2"><i class="pi pi-cog mr-2" />Settings</Tab>
                    <Tab value="3" disabled>Disabled</Tab>
                </TabList>
                <TabPanels>
                    <TabPanel value="0">
                        <p class="text-sm p-2">Welcome to the Home tab. This is a clean, modern tab component from PrimeVue v4.</p>
                    </TabPanel>
                    <TabPanel value="1">
                        <p class="text-sm p-2">Reports tab content. You could embed a DataTable or chart here.</p>
                    </TabPanel>
                    <TabPanel value="2">
                        <p class="text-sm p-2">Settings tab content with form inputs and configuration options.</p>
                    </TabPanel>
                </TabPanels>
            </Tabs>
        </section>

        <!-- Toolbar -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Toolbar</h2>
            <Toolbar>
                <template #start>
                    <Button icon="pi pi-plus" class="mr-2" label="New" />
                    <Button icon="pi pi-upload" severity="secondary" label="Upload" />
                </template>
                <template #center>
                    <span class="font-semibold text-sm">Document Editor</span>
                </template>
                <template #end>
                    <Button icon="pi pi-search" rounded outlined class="mr-2" />
                    <Button icon="pi pi-times" rounded outlined severity="danger" />
                </template>
            </Toolbar>
        </section>

        <!-- Divider -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Divider</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-medium mb-2">Horizontal variants</h3>
                    <p class="text-sm">Above text</p>
                    <Divider />
                    <p class="text-sm">With label</p>
                    <Divider align="center"><span class="text-xs font-medium px-2">OR</span></Divider>
                    <p class="text-sm">With icon</p>
                    <Divider align="center" type="dashed"><i class="pi pi-star" /></Divider>
                    <p class="text-sm">Below text</p>
                </div>
                <div class="flex gap-4 h-24">
                    <p class="text-sm">Left</p>
                    <Divider layout="vertical" />
                    <p class="text-sm">Middle</p>
                    <Divider layout="vertical" type="dashed" />
                    <p class="text-sm">Right</p>
                </div>
            </div>
        </section>

        <!-- Fieldset -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Fieldset</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <Fieldset legend="User Details">
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <span class="text-muted-foreground">Name:</span><span>John Doe</span>
                        <span class="text-muted-foreground">Email:</span><span>john@example.com</span>
                        <span class="text-muted-foreground">Role:</span><span>Admin</span>
                    </div>
                </Fieldset>
                <Fieldset legend="Collapsible" :toggleable="true">
                    <p class="text-sm">This fieldset can be collapsed and expanded.</p>
                </Fieldset>
            </div>
        </section>

        <!-- ScrollPanel -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ScrollPanel</h2>
            <ScrollPanel style="width: 100%; height: 150px">
                <div class="p-3 text-sm space-y-2">
                    <p v-for="i in 15" :key="i">Line {{ i }}: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                </div>
            </ScrollPanel>
        </section>

        <!-- Splitter -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Splitter</h2>
            <div class="space-y-4">
                <h3 class="text-sm font-medium">Horizontal</h3>
                <Splitter style="height: 150px">
                    <SplitterPanel :size="40" :min-size="20">
                        <div class="p-3 text-sm">Left Panel (40%)</div>
                    </SplitterPanel>
                    <SplitterPanel :size="60">
                        <div class="p-3 text-sm">Right Panel (60%)</div>
                    </SplitterPanel>
                </Splitter>
                <h3 class="text-sm font-medium">Vertical</h3>
                <Splitter style="height: 200px" layout="vertical">
                    <SplitterPanel :size="40">
                        <div class="p-3 text-sm">Top Panel</div>
                    </SplitterPanel>
                    <SplitterPanel :size="60">
                        <div class="p-3 text-sm">Bottom Panel</div>
                    </SplitterPanel>
                </Splitter>
            </div>
        </section>

        <!-- Stepper -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Stepper</h2>
            <Stepper v-model:value="activeStep" linear>
                <StepList>
                    <Step value="0">Account</Step>
                    <Step value="1">Profile</Step>
                    <Step value="2">Review</Step>
                </StepList>
                <StepPanels>
                    <StepPanel value="0">
                        <div class="flex flex-col gap-4 p-4">
                            <p class="text-sm">Create your account by providing your email and password.</p>
                            <Button label="Next" icon="pi pi-arrow-right" icon-pos="right" @click="activeStep = '1'" />
                        </div>
                    </StepPanel>
                    <StepPanel value="1">
                        <div class="flex flex-col gap-4 p-4">
                            <p class="text-sm">Complete your profile information.</p>
                            <div class="flex gap-2">
                                <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activeStep = '0'" />
                                <Button label="Next" icon="pi pi-arrow-right" icon-pos="right" @click="activeStep = '2'" />
                            </div>
                        </div>
                    </StepPanel>
                    <StepPanel value="2">
                        <div class="flex flex-col gap-4 p-4">
                            <p class="text-sm">Review your information and submit.</p>
                            <div class="flex gap-2">
                                <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activeStep = '1'" />
                                <Button label="Submit" severity="success" icon="pi pi-check" @click="activeStep = '0'" />
                            </div>
                        </div>
                    </StepPanel>
                </StepPanels>
            </Stepper>
        </section>
    </div>
</template>
