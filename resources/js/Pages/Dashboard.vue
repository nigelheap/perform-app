<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ classSessions: Array })
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <ul class="flex flex-row gap-4 justify-stretch shadow mb-4">
                <li v-for="classSession in classSessions" class="w-full">
                    <Link :href="route('class-sessions.show', classSession.id)"
                             class="p-4 block bg-white rounded-lg">
                        {{ classSession.name }}
                    </Link>
                </li>
            </ul>

            <Link class="underline" :href="route('class-sessions.create')">
                Agregar sesión de clase
            </Link>
        </div>

    </AuthenticatedLayout>
</template>
