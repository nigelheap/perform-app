<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({ classSessions: Array })
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Class sessions</h2>
        </template>


        <ul class="flex flex-row gap-4">
            <li v-for="classSession in classSessions">
                <NavLink :href="route('class-sessions.show', classSession.id)"
                         class="p-4">
                    {{ classSession.name }}
                </NavLink>
            </li>
        </ul>

    </AuthenticatedLayout>
</template>
