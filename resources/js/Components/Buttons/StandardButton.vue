<script setup>
const emit = defineEmits(['click'])
// const props = defineProps(['foo'])

const click = () => emit('click')
</script>
<template>
  <button
      type="button"
      @click="click"
      class="text-white w-full bg-white hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center justify-between dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
    <slot />
  </button>
</template>
