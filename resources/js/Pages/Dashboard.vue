<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";

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
                    <div class="p-4 block bg-white hover:bg-strong-100 rounded-md shadow relative">

                        <div class="flex justify-between">
                            <div class="space-y-2">
                                <h3 class="font-bold">{{ curso.name }}</h3>
                                <div>{{ curso.owner.name }}</div>
                                <div class="bg-stone-200 px-2 py-1 text-sm rounded-full">
                                    {{ $date(curso.created_at).fromNow() }}
                                </div>
                            </div>

                            <div>


                                <div class="flex justify-end" v-if="!curso.joined">
                                    <SecondaryButton
                                        :href="route('cursos.join', curso.id)"
                                        type="link">Unirse</SecondaryButton>
                                </div>
                            </div>
                        </div>
                        <Link :href="route('cursos.show', curso.id)"
                              v-if="curso.joined"
                              class="absolute inset-0"></Link>


                    </div>
                </li>
            </ul>

            <PrimaryButton type="link" class="underline" :href="route('cursos.create')">
                Agregar curso
            </PrimaryButton>
        </div>

    </AuthenticatedLayout>
</template>
