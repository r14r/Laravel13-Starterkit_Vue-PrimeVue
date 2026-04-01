<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import InputNumber from 'primevue/inputnumber';
import Password from 'primevue/password';
import Select from 'primevue/select';
import MultiSelect from 'primevue/multiselect';
import Checkbox from 'primevue/checkbox';
import RadioButton from 'primevue/radiobutton';
import ToggleSwitch from 'primevue/toggleswitch';
import Slider from 'primevue/slider';
import Rating from 'primevue/rating';
import ColorPicker from 'primevue/colorpicker';
import InputMask from 'primevue/inputmask';
import AutoComplete from 'primevue/autocomplete';
import Chips from 'primevue/chips';
import Knob from 'primevue/knob';
import DatePicker from 'primevue/datepicker';
import ToggleButton from 'primevue/togglebutton';
import FloatLabel from 'primevue/floatlabel';
import IftaLabel from 'primevue/iftalabel';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Button from 'primevue/button';
import SelectButton from 'primevue/selectbutton';
import Listbox from 'primevue/listbox';
import TreeSelect from 'primevue/treeselect';
import CascadeSelect from 'primevue/cascadeselect';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import CheckboxGroup from 'primevue/checkboxgroup';
import RadioButtonGroup from 'primevue/radiobuttongroup';
import InputOtp from 'primevue/inputotp';
import InputChips from 'primevue/inputchips';
import type { TreeNode } from 'primevue/treenode';

defineOptions({
    layout: (props: object) => ({
        breadcrumbs: [
            { title: 'PrimeVue', href: '/primevue' },
            { title: 'Form Components', href: '/primevue/form' },
        ],
    }),
});

// Text inputs
const textValue = ref('');
const textareaValue = ref('');
const passwordValue = ref('');
const maskedValue = ref('');
const iconSearchValue = ref('');

// Numeric
const numberValue = ref<number | null>(42);
const currencyValue = ref<number | null>(1500);
const sliderValue = ref(50);
const knobValue = ref(75);

// Autocomplete
const autoCompleteValue = ref('');
const suggestions = ref<string[]>([]);
const countries = ['Australia', 'Austria', 'Belgium', 'Brazil', 'Canada', 'France', 'Germany', 'India', 'Italy', 'Japan', 'Mexico', 'Netherlands', 'Spain', 'Sweden', 'Switzerland', 'United Kingdom', 'United States'];
function searchCountry(event: { query: string }) {
    suggestions.value = countries.filter(c => c.toLowerCase().startsWith(event.query.toLowerCase()));
}

// Select
const selectedCity = ref<string | null>(null);
const cities = ['New York', 'London', 'Paris', 'Tokyo', 'Berlin', 'Sydney'];

const selectedCities = ref<string[]>([]);

// Checkbox
const checkboxValue = ref(false);
const groupChecked = ref<string[]>([]);

// Radio
const radioValue = ref('');

// ToggleSwitch
const toggleValue = ref(false);

// Rating
const ratingValue = ref<number | null>(3);
const ratingStarsValue = ref<number | null>(null);

// ColorPicker
const colorValue = ref('ff0000');

// DatePicker
const dateValue = ref<Date | null>(null);
const dateRangeValue = ref<Date[] | null>(null);

// Chips
const chipsValue = ref<string[]>(['Vue', 'PrimeVue']);

// ToggleButton
const toggleButtonValue = ref(false);

// SelectButton
const selectButtonValue = ref('Monthly');
const selectButtonOptions = ['Monthly', 'Yearly'];
const selectButtonSeverity = ref('info');
const selectButtonSeverities = [
    { label: 'Success', value: 'success' },
    { label: 'Info', value: 'info' },
    { label: 'Warning', value: 'warning' },
];

// Listbox
const listboxValue = ref<string | null>(null);
const listboxOptions = ['New York', 'London', 'Paris', 'Tokyo', 'Berlin', 'Sydney'];

// TreeSelect
const treeSelectValue = ref(null);
const treeSelectNodes = ref<TreeNode[]>([
    {
        key: '0',
        label: 'Documents',
        children: [
            { key: '0-0', label: 'Work', children: [
                { key: '0-0-0', label: 'Expenses.doc' },
                { key: '0-0-1', label: 'Resume.doc' },
            ]},
        ],
    },
    {
        key: '1',
        label: 'Events',
        children: [
            { key: '1-0', label: 'Meeting' },
            { key: '1-1', label: 'Product Launch' },
        ],
    },
]);

// CascadeSelect
interface CascadeCity {
    cname: string;
}

const cascadeSelectValue = ref<CascadeCity | null>(null);
const cascadeSelectOptions = ref([
    {
        cname: 'Australia',
        code: 'AU',
        states: [
            { cname: 'New South Wales', cities: [{ cname: 'Sydney' }, { cname: 'Newcastle' }] },
            { cname: 'Queensland', cities: [{ cname: 'Brisbane' }, { cname: 'Gold Coast' }] },
        ],
    },
    {
        cname: 'United States',
        code: 'US',
        states: [
            { cname: 'California', cities: [{ cname: 'Los Angeles' }, { cname: 'San Francisco' }] },
            { cname: 'New York', cities: [{ cname: 'New York City' }, { cname: 'Buffalo' }] },
        ],
    },
]);

// CheckboxGroup
const checkboxGroupValue = ref<string[]>([]);

// RadioButtonGroup
const radioGroupValue = ref('');

// InputOtp
const otpValue = ref('');
const otpMaskedValue = ref('');

// InputChips
const inputChipsValue = ref<string[]>(['Laravel', 'Vue']);
</script>

<template>
    <Head title="Form Components" />

    <div class="p-6 space-y-8">
        <div>
            <h1 class="text-2xl font-bold mb-1">Form Components</h1>
            <p class="text-muted-foreground">All PrimeVue form input components.</p>
        </div>

        <!-- Text Inputs -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Text Inputs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">InputText (basic)</label>
                    <InputText v-model="textValue" placeholder="Enter text..." class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">InputText (invalid)</label>
                    <InputText placeholder="Invalid state" invalid class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">InputText (disabled)</label>
                    <InputText placeholder="Disabled" disabled class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Password</label>
                    <Password v-model="passwordValue" placeholder="Enter password..." toggle-mask class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Textarea</label>
                    <Textarea v-model="textareaValue" rows="4" placeholder="Enter text..." class="w-full" auto-resize />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">InputMask (phone)</label>
                    <InputMask v-model="maskedValue" mask="(999) 999-9999" placeholder="(999) 999-9999" class="w-full" />
                </div>
            </div>
        </section>

        <!-- Icon Field -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">IconField</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Icon Left</label>
                    <IconField>
                        <InputIcon class="pi pi-search" />
                        <InputText v-model="iconSearchValue" placeholder="Search..." class="w-full" />
                    </IconField>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Icon Right</label>
                    <IconField icon-position="right">
                        <InputIcon class="pi pi-spin pi-spinner" />
                        <InputText placeholder="Loading..." class="w-full" />
                    </IconField>
                </div>
            </div>
        </section>

        <!-- Float Label -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">FloatLabel & IftaLabel</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="pt-4">
                    <FloatLabel>
                        <InputText id="float-input" class="w-full" />
                        <label for="float-input">Username</label>
                    </FloatLabel>
                </div>
                <div class="pt-4">
                    <FloatLabel variant="in">
                        <InputText id="float-input-in" class="w-full" />
                        <label for="float-input-in">Email</label>
                    </FloatLabel>
                </div>
                <div class="pt-4">
                    <IftaLabel>
                        <InputText id="ifta-input" class="w-full" />
                        <label for="ifta-input">First Name</label>
                    </IftaLabel>
                </div>
            </div>
        </section>

        <!-- Number Inputs -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">InputNumber</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Basic</label>
                    <InputNumber v-model="numberValue" class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Currency (USD)</label>
                    <InputNumber v-model="currencyValue" mode="currency" currency="USD" locale="en-US" class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">With Buttons</label>
                    <InputNumber v-model="numberValue" show-buttons :min="0" :max="100" class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Percentage</label>
                    <InputNumber v-model="numberValue" suffix="%" class="w-full" />
                </div>
            </div>
        </section>

        <!-- AutoComplete -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">AutoComplete</h2>
            <div class="flex flex-col gap-1 max-w-sm">
                <label class="text-sm font-medium">Type a country name</label>
                <AutoComplete
                    v-model="autoCompleteValue"
                    :suggestions="suggestions"
                    @complete="searchCountry"
                    placeholder="Search countries..."
                    class="w-full"
                />
            </div>
        </section>

        <!-- Select / Dropdown -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Select (Dropdown)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Single Select</label>
                    <Select v-model="selectedCity" :options="cities" placeholder="Select a City" class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">MultiSelect</label>
                    <MultiSelect
                        v-model="selectedCities"
                        :options="cities"
                        placeholder="Select Cities"
                        :max-selected-labels="2"
                        class="w-full"
                    />
                </div>
            </div>
        </section>

        <!-- DatePicker -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">DatePicker</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Single Date</label>
                    <DatePicker v-model="dateValue" placeholder="Select date" show-icon class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Date Range</label>
                    <DatePicker v-model="dateRangeValue" selection-mode="range" placeholder="Select range" show-icon class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">With Time</label>
                    <DatePicker v-model="dateValue" show-time hour-format="24" show-icon class="w-full" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Month Picker</label>
                    <DatePicker v-model="dateValue" view="month" date-format="mm/yy" class="w-full" />
                </div>
            </div>
        </section>

        <!-- Checkbox -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Checkbox</h2>
            <div class="flex flex-wrap gap-6">
                <div class="flex items-center gap-2">
                    <Checkbox v-model="checkboxValue" input-id="cb1" :binary="true" />
                    <label for="cb1">Binary Checkbox</label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox v-model="groupChecked" input-id="cb-vue" value="Vue" />
                    <label for="cb-vue">Vue</label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox v-model="groupChecked" input-id="cb-react" value="React" />
                    <label for="cb-react">React</label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox v-model="groupChecked" input-id="cb-angular" value="Angular" />
                    <label for="cb-angular">Angular</label>
                </div>
                <div class="flex items-center gap-2">
                    <Checkbox :model-value="false" :binary="true" disabled />
                    <label>Disabled</label>
                </div>
            </div>
            <p class="text-sm text-muted-foreground">Selected: {{ groupChecked.join(', ') || 'none' }}</p>
        </section>

        <!-- RadioButton -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">RadioButton</h2>
            <div class="flex flex-wrap gap-6">
                <div class="flex items-center gap-2">
                    <RadioButton v-model="radioValue" input-id="r1" value="Small" />
                    <label for="r1">Small</label>
                </div>
                <div class="flex items-center gap-2">
                    <RadioButton v-model="radioValue" input-id="r2" value="Medium" />
                    <label for="r2">Medium</label>
                </div>
                <div class="flex items-center gap-2">
                    <RadioButton v-model="radioValue" input-id="r3" value="Large" />
                    <label for="r3">Large</label>
                </div>
            </div>
            <p class="text-sm text-muted-foreground">Selected: {{ radioValue || 'none' }}</p>
        </section>

        <!-- ToggleSwitch & ToggleButton -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Toggle Controls</h2>
            <div class="flex flex-wrap gap-6 items-center">
                <div class="flex flex-col gap-2 items-center">
                    <label class="text-sm font-medium">ToggleSwitch</label>
                    <ToggleSwitch v-model="toggleValue" />
                    <span class="text-xs">{{ toggleValue ? 'On' : 'Off' }}</span>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    <label class="text-sm font-medium">ToggleButton</label>
                    <ToggleButton v-model="toggleButtonValue" on-label="Enabled" off-label="Disabled" on-icon="pi pi-check" off-icon="pi pi-times" />
                </div>
            </div>
        </section>

        <!-- Slider -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Slider</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-medium">Horizontal: {{ sliderValue }}</label>
                    <Slider v-model="sliderValue" class="w-full" />
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium">Range Slider</label>
                    <Slider :model-value="[20, 80]" :range="true" class="w-full" />
                </div>
            </div>
        </section>

        <!-- Knob -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Knob</h2>
            <div class="flex flex-wrap gap-8 items-center">
                <div class="flex flex-col items-center gap-2">
                    <Knob v-model="knobValue" />
                    <span class="text-sm">Basic</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <Knob v-model="knobValue" :step="10" show-value suffix="%" />
                    <span class="text-sm">Step + Suffix</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <Knob :model-value="60" read-only />
                    <span class="text-sm">Read-only</span>
                </div>
            </div>
        </section>

        <!-- Rating -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Rating</h2>
            <div class="flex flex-wrap gap-8 items-center">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">5 Stars: {{ ratingValue }}</label>
                    <Rating v-model="ratingValue" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">10 Stars</label>
                    <Rating v-model="ratingStarsValue" :stars="10" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Read-only</label>
                    <Rating :model-value="3" readonly />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Disabled</label>
                    <Rating :model-value="4" disabled />
                </div>
            </div>
        </section>

        <!-- ColorPicker -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">ColorPicker</h2>
            <div class="flex flex-wrap gap-8 items-start">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Inline</label>
                    <ColorPicker v-model="colorValue" inline />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Popup</label>
                    <div class="flex items-center gap-2">
                        <ColorPicker v-model="colorValue" />
                        <span class="text-sm">#{{ colorValue }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Chips -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Chips (Tag Input)</h2>
            <div class="flex flex-col gap-1 max-w-md">
                <label class="text-sm font-medium">Press Enter to add a chip</label>
                <Chips v-model="chipsValue" placeholder="Add tags..." class="w-full" />
                <p class="text-sm text-muted-foreground">Tags: {{ chipsValue.join(', ') }}</p>
            </div>
        </section>

        <!-- InputOtp -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">InputOtp</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Basic OTP (6 digits)</label>
                    <InputOtp v-model="otpValue" :length="6" />
                    <p class="text-xs text-muted-foreground">Value: {{ otpValue }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Masked OTP</label>
                    <InputOtp v-model="otpMaskedValue" :length="4" mask />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Integer Only</label>
                    <InputOtp v-model="otpValue" :length="6" integer-only />
                </div>
            </div>
        </section>

        <!-- SelectButton -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">SelectButton</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Basic</label>
                    <SelectButton v-model="selectButtonValue" :options="selectButtonOptions" />
                    <p class="text-xs text-muted-foreground">Selected: {{ selectButtonValue }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">With Objects</label>
                    <SelectButton v-model="selectButtonSeverity" :options="selectButtonSeverities" option-label="label" option-value="value" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Multiple</label>
                    <SelectButton :model-value="['Monthly']" :options="selectButtonOptions" multiple />
                </div>
            </div>
        </section>

        <!-- Listbox -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">Listbox</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Single Select</label>
                    <Listbox v-model="listboxValue" :options="listboxOptions" class="w-full" />
                    <p class="text-xs text-muted-foreground">Selected: {{ listboxValue }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">With Filter</label>
                    <Listbox v-model="listboxValue" :options="listboxOptions" filter class="w-full" />
                </div>
            </div>
        </section>

        <!-- TreeSelect -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">TreeSelect</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Single Select</label>
                    <TreeSelect v-model="treeSelectValue" :options="treeSelectNodes" placeholder="Select a node" class="w-full" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium">Multiple Select</label>
                    <TreeSelect v-model="treeSelectValue" :options="treeSelectNodes" selection-mode="multiple" placeholder="Select nodes" class="w-full" />
                </div>
            </div>
        </section>

        <!-- CascadeSelect -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">CascadeSelect</h2>
            <div class="max-w-sm">
                <label class="text-sm font-medium mb-2 block">Select a City</label>
                <CascadeSelect
                    v-model="cascadeSelectValue"
                    :options="cascadeSelectOptions"
                    option-label="cname"
                    option-group-label="cname"
                    :option-group-children="['states', 'cities']"
                    placeholder="Select a City"
                    class="w-full"
                />
                <p class="text-xs text-muted-foreground mt-1">Selected: {{ cascadeSelectValue?.cname || 'none' }}</p>
            </div>
        </section>

        <!-- InputGroup -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">InputGroup</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">With Addon</label>
                    <InputGroup>
                        <InputGroupAddon>@</InputGroupAddon>
                        <InputText placeholder="Username" />
                    </InputGroup>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">With Button</label>
                    <InputGroup>
                        <InputText placeholder="Search..." />
                        <Button icon="pi pi-search" />
                    </InputGroup>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Double Addons</label>
                    <InputGroup>
                        <InputGroupAddon>$</InputGroupAddon>
                        <InputText placeholder="Amount" />
                        <InputGroupAddon>.00</InputGroupAddon>
                    </InputGroup>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">With Checkbox</label>
                    <InputGroup>
                        <InputGroupAddon>
                            <Checkbox :binary="true" :model-value="false" />
                        </InputGroupAddon>
                        <InputText placeholder="Checkbox addon" />
                    </InputGroup>
                </div>
            </div>
        </section>

        <!-- CheckboxGroup -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">CheckboxGroup</h2>
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium">Select Frameworks</label>
                <CheckboxGroup v-model="checkboxGroupValue" name="frameworks">
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-2">
                            <Checkbox input-id="cg-vue" value="Vue" />
                            <label for="cg-vue">Vue</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <Checkbox input-id="cg-react" value="React" />
                            <label for="cg-react">React</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <Checkbox input-id="cg-angular" value="Angular" />
                            <label for="cg-angular">Angular</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <Checkbox input-id="cg-svelte" value="Svelte" />
                            <label for="cg-svelte">Svelte</label>
                        </div>
                    </div>
                </CheckboxGroup>
                <p class="text-xs text-muted-foreground">Selected: {{ checkboxGroupValue.join(', ') || 'none' }}</p>
            </div>
        </section>

        <!-- RadioButtonGroup -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">RadioButtonGroup</h2>
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium">Select Size</label>
                <RadioButtonGroup v-model="radioGroupValue" name="size">
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-2">
                            <RadioButton input-id="rg-sm" value="Small" />
                            <label for="rg-sm">Small</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <RadioButton input-id="rg-md" value="Medium" />
                            <label for="rg-md">Medium</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <RadioButton input-id="rg-lg" value="Large" />
                            <label for="rg-lg">Large</label>
                        </div>
                    </div>
                </RadioButtonGroup>
                <p class="text-xs text-muted-foreground">Selected: {{ radioGroupValue || 'none' }}</p>
            </div>
        </section>

        <!-- InputChips -->
        <section class="space-y-4">
            <h2 class="text-xl font-semibold border-b pb-2">InputChips</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Basic (press Enter to add)</label>
                    <InputChips v-model="inputChipsValue" placeholder="Add tags..." class="w-full" />
                    <p class="text-xs text-muted-foreground">Tags: {{ inputChipsValue.join(', ') }}</p>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">With Separator (,)</label>
                    <InputChips v-model="inputChipsValue" separator="," placeholder="Separate with comma..." class="w-full" />
                </div>
            </div>
        </section>
    </div>
</template>
