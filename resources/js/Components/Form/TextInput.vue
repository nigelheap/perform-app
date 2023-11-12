<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    color:{

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
    <input
        class="rounded-md shadow-sm"
        :class="{
            'border-none bg-brand-orange text-white autofill:bg-brand-orange placeholder:font-bold placeholder:tracking-widest placeholder:uppercase placeholder:text-center placeholder:text-white focus:ring-offset-2 focus:ring-2 focus:border-brand-orange focus:ring-brand-orange' : color === 'orange',
            'border-none bg-brand-blue text-white autofill:bg-brand-blue placeholder:font-bold placeholder:tracking-widest placeholder:uppercase placeholder:text-center placeholder:text-white focus:ring-offset-2 focus:ring-2 focus:border-brand-blue focus:ring-brand-blue' : color === 'blue',
            'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500' : !['blue', 'orange'].includes(color),
        }"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
