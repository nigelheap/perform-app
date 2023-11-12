<script setup>
// const emit = defineEmits(['click'])
const props = defineProps(['type'])

const types = {
  error: 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400',
  info: 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400',
  green: 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400',
  warning: 'text-yellow-800 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300',
  dark: 'text-gray-800 bg-gray-50 dark:bg-gray-800 dark:text-gray-300',
}

</script>
<template>
  <div class="p-4 mb-4 text-sm rounded-lg" :class="types[props.type]" role="alert">
    <slot></slot>
  </div>
</template>
