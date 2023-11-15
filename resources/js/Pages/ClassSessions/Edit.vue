<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({ classSession: Object })
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Class sessions</h2>
        </template>

        {{ classSession }}
    </AuthenticatedLayout>
</template>
