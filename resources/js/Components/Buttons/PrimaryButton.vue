<script setup>
const emit = defineEmits(['click'])
const props = defineProps({
    type: String,
})

const click = () => emit('click')
</script>
<template>
    <a v-if="type === 'link'"
       @click="click"
       class="bg-brand-orange no-underline text-white rounded-md shadow-sm w-full hover:bg-brand-orange/70 focus:ring-4 focus:outline-none font-medium text-lg px-5 py-1.5 inline-flex items-center justify-center uppercase mb-2">
        <slot></slot>
    </a>
    <button :type="props.type ?? 'submit'"
          v-else
          @click="click"
          class="bg-brand-orange text-white rounded-md shadow-sm w-full hover:bg-brand-orange/70 focus:ring-4 focus:outline-none font-medium text-lg px-5 py-1.5 inline-flex items-center justify-center uppercase mb-2">
    <slot></slot>
    </button>
</template>
