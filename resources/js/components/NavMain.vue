<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ChevronRight } from 'lucide-vue-next';
import { ref } from 'vue';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
} from '@/components/ui/sidebar';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import type { NavItem } from '@/types';

defineProps<{
    items: NavItem[];
}>();

const { isCurrentUrl } = useCurrentUrl();

const openItems = ref<Set<number>>(new Set());

function toggleItem(index: number) {
    if (openItems.value.has(index)) {
        openItems.value.delete(index);
    } else {
        openItems.value.add(index);
    }
}

function isOpen(index: number) {
    return openItems.value.has(index);
}
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Platform</SidebarGroupLabel>
        <SidebarMenu>
            <template v-for="(item, index) in items" :key="item.title">
                <!-- Item with submenu -->
                <Collapsible v-if="item.items?.length" :open="isOpen(index)" @update:open="() => toggleItem(index)" as-child>
                    <SidebarMenuItem>
                        <CollapsibleTrigger as-child>
                            <SidebarMenuButton :tooltip="item.title">
                                <component :is="item.icon" v-if="item.icon" />
                                <span>{{ item.title }}</span>
                                <ChevronRight
                                    class="ml-auto transition-transform duration-200"
                                    :class="{ 'rotate-90': isOpen(index) }"
                                />
                            </SidebarMenuButton>
                        </CollapsibleTrigger>
                        <CollapsibleContent>
                            <SidebarMenuSub>
                                <SidebarMenuSubItem v-for="sub in item.items" :key="sub.title">
                                    <SidebarMenuSubButton as-child :is-active="sub.href ? isCurrentUrl(sub.href) : false">
                                        <Link :href="sub.href ?? '/'">
                                            <component :is="sub.icon" v-if="sub.icon" />
                                            <span>{{ sub.title }}</span>
                                        </Link>
                                    </SidebarMenuSubButton>
                                </SidebarMenuSubItem>
                            </SidebarMenuSub>
                        </CollapsibleContent>
                    </SidebarMenuItem>
                </Collapsible>

                <!-- Regular item without submenu -->
                <SidebarMenuItem v-else>
                    <SidebarMenuButton
                        as-child
                        :is-active="item.href ? isCurrentUrl(item.href) : false"
                        :tooltip="item.title"
                    >
                        <Link :href="item.href ?? '/'">
                            <component :is="item.icon" v-if="item.icon" />
                            <span>{{ item.title }}</span>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </template>
        </SidebarMenu>
    </SidebarGroup>
</template>
