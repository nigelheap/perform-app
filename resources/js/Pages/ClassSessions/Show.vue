<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AddPostsIcons from "@/Components/AddPostsIcons.vue";

defineProps({ classSession: Object })
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ classSession.name }}</h2>
        </template>

        <AddPostsIcons :class-session="classSession" />

        {{ classSession }}
    </AuthenticatedLayout>
</template>
