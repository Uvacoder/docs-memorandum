<script setup lang="ts">
import { RenderFunction } from 'vue'

const props = defineProps<{
  navigation: {
    name: string
    href: string
    icon: RenderFunction
    current: boolean
  }[]
  secondaryNavigation: {
    name: string
    href: string
    icon: RenderFunction
  }[]
  user: {
    name: string
    imageUrl: string
  }
}>()
</script>

<template>
  <div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div
        class="flex-1 flex flex-col min-h-0 border-r border-gray-700 bg-gray-800"
      >
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
          <div class="flex items-center flex-shrink-0 px-4">
            <img
              class="h-8 w-auto"
              src="https://tailwindui.com/img/logos/workflow-logo-pink-500-mark-gray-900-text.svg"
              alt="Workflow"
            />
          </div>
          <nav class="mt-5 flex-1" aria-label="Sidebar">
            <div class="px-2 space-y-1">
              <a
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                :class="[
                  item.current
                    ? 'bg-gray-700 text-gray-100'
                    : 'text-gray-400 hover:bg-gray-700 hover:text-gray-100',
                  'group flex items-center px-2 py-2 text-sm font-medium rounded-md',
                ]"
                :aria-current="item.current ? 'page' : undefined"
              >
                <component
                  :is="item.icon"
                  :class="[
                    item.current
                      ? 'text-gray-400'
                      : 'text-gray-400 group-hover:text-gray-400',
                    'mr-3 flex-shrink-0 h-6 w-6',
                  ]"
                  aria-hidden="true"
                />
                {{ item.name }}
              </a>
            </div>
            <hr class="border-t border-gray-700 my-5" aria-hidden="true" />
            <div class="flex-1 px-2 space-y-1">
              <a
                v-for="item in secondaryNavigation"
                :key="item.name"
                :href="item.href"
                class="text-gray-400 hover:bg-gray-700 hover:text-gray-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
              >
                <component
                  :is="item.icon"
                  class="text-gray-400 group-hover:text-gray-400 mr-3 flex-shrink-0 h-6 w-6"
                  aria-hidden="true"
                />
                {{ item.name }}
              </a>
            </div>
          </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-700 p-4">
          <a href="#" class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
              <div>
                <img
                  class="inline-block h-9 w-9 rounded-full"
                  :src="user.imageUrl"
                  alt=""
                />
              </div>
              <div class="ml-3">
                <p
                  class="text-sm font-medium text-gray-300 group-hover:text-gray-100"
                >
                  {{ user.name }}
                </p>
                <p
                  class="text-xs font-medium text-gray-400 group-hover:text-gray-300"
                >
                  View profile
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
