<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ cursos: Array })
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <ul class="flex flex-row gap-4 justify-stretch mb-4">
                <li v-for="curso in cursos" class="w-full">
                    <Link :href="route('cursos.show', curso.id)"
                             class="p-4 block bg-white hover:bg-strong-100 rounded-md shadow">
                        <div>{{ curso.name }}</div>
                        <div>{{ curso.user.name }}</div>
                        <div class="flex justify-end">
                            <div class="bg-stone-200 px-2 py-1 text-sm rounded-full">
                                {{ $date(curso.created_at).fromNow() }}
                            </div>
                        </div>
                    </Link>
                </li>
            </ul>

            <Link class="underline" :href="route('cursos.create')">
                Agregar curso
            </Link>
        </div>

    </AuthenticatedLayout>
</template>
