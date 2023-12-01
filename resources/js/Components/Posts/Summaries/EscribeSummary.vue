<script setup>
defineProps({
    post: Object,
})
</script>
<template>
    <p class="text-sm leading-6 text-gray-500">{{ post.description }}</p>
</template>
