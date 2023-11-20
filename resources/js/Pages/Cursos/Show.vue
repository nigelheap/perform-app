<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AddPostsIcons from "@/Components/AddPostsIcons.vue";

defineProps({ curso: Object })
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ curso.name }}</h2>
        </template>

        <AddPostsIcons :curso="curso" />

        {{ curso }}
    </AuthenticatedLayout>
</template>
