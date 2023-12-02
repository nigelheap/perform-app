<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";
import BackToCurso from "@/Components/BackToCurso.vue";

defineProps({ curso: Array })
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Geo location</h2>
        </template>

        <BackToCurso :curso="curso" />


    </AuthenticatedLayout>
</template>
