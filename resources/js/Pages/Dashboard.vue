<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";
import Avatar from "@/Components/icons/Avatar.vue";
import UserCircle from "@/Components/Icons/UserCircle.vue";
import { ref } from 'vue';
import { MapboxMap } from '@studiometa/vue-mapbox-gl';

const mapCenter = ref([0, 0]);
defineProps({ cursos: Array })
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <MapboxMap
            style="height: 400px"
            :access-token="$config.mapbox.key"
            map-style="mapbox://styles/mapbox/streets-v11"
            :center="mapCenter"
            :zoom="1" />

        <div class="py-12">
            <ul class="flex flex-col gap-4 justify-stretch mb-4">
                <li v-for="curso in cursos" class="w-full bg-white hover:bg-stone-100 rounded-md shadow">
                    <div class="p-4 block relative">

                        <div class="flex justify-between">
                            <div class="space-y-2">
                                <h3 class="font-bold">{{ curso.name }}</h3>
                                <div class="text-stone-500 flex gap-1 mb-2" title="Professor">
                                    <UserCircle />
                                    {{ curso.owner.name }}
                                </div>
                                <div class="bg-stone-200 px-2 py-1 text-sm rounded-full">
                                    {{ $date(curso.created_at).fromNow() }}
                                </div>
                            </div>

                            <div>
                                <ul class="mb-4 flex justify-end relative" v-if="curso.users && curso.users.length > 0">
                                    <li v-for="user in curso.users" class="-ml-2 relative block">
                                        <Avatar :name="user.name" :size="40" class="rounded-full shadow block border border-white"></Avatar>
                                    </li>
                                </ul>
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
