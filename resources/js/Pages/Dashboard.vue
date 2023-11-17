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
            <ul class="flex flex-row gap-4 justify-stretch mb-4">
                <li v-for="classSession in classSessions" class="w-full">
                    <Link :href="route('class-sessions.show', classSession.id)"
                             class="p-4 block bg-white hover:bg-strong-100 rounded-md shadow">
                        <div>{{ classSession.name }}</div>
                        <div class="flex justify-end">
                            <div class="bg-stone-200 px-2 py-1 text-sm rounded-full">
                                {{ $date(classSession.created_at).fromNow() }}
                            </div>
                        </div>
                    </Link>
                </li>
            </ul>

            <Link class="underline" :href="route('class-sessions.create')">
                Agregar sesión de clase
            </Link>
        </div>

    </AuthenticatedLayout>
</template>
