<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    color:{
        type: String,
        default: 'normal',
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });


</script>

<template>
    <textarea
        class=" "
        :class="{
            'border-none bg-brand-orange text-white autofill:bg-brand-orange autofill:text-white placeholder:font-bold placeholder:tracking-widest placeholder:uppercase placeholder:text-center placeholder:text-white focus:ring-offset-2 focus:ring-2 focus:border-brand-orange focus:ring-brand-orange' : color === 'orange',
            'border-none bg-brand-blue text-white autofill:bg-brand-blue autofill:text-white placeholder:font-bold placeholder:tracking-widest placeholder:uppercase placeholder:text-center placeholder:text-white focus:ring-offset-2 focus:ring-2 focus:border-brand-blue focus:ring-brand-blue' : color === 'blue',
            'shadow-sm rounded-md border border-stone-300 focus:ring-2 focus:border-brand-orange focus:ring-brand-orange ' : color === 'basic',
            'border-0 border-b border-stone-700 text-stone-900 focus:ring-0 focus:border-brand-orange focus:ring-brand-orange ' : color === 'normal',
        }"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    ></textarea>
</template>
