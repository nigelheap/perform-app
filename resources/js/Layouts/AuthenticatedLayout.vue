<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import HeaderAuthed from "@/Components/HeaderAuthed.vue";
</script>

<template>
    <div>

        <div class="min-h-screen bg-brand-background">

            <HeaderAuthed />

            <div class="container mb-8">
                <Link href="/">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                </Link>
            </div>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <div class="container w-full mt-6">
                <slot />
            </div>
        </div>
    </div>
</template>
