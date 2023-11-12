<script setup>
const emit = defineEmits(['click'])
const props = defineProps({
    type: String
})

const click = () => emit('click')
</script>
<template>
  <button :type="props.type ?? 'submit'"
          @click="click"
          class="bg-brand-orange text-white rounded-md shadow-sm w-full hover:bg-brand-orange/70 focus:ring-4 focus:outline-none font-medium text-lg px-5 py-2.5 inline-flex items-center justify-center uppercase mb-2">
    <slot></slot>
  </button>
</template>
