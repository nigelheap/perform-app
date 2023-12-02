<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Recorder from "@/Components/Recorder.vue";
import BackToCurso from "@/Components/BackToCurso.vue";

defineProps({ classSessions: Array })
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fotos</h2>
        </template>
        <BackToCurso :curso="curso" />

        <Recorder />
    </AuthenticatedLayout>
</template>
