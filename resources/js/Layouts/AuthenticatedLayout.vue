<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import HeaderAuthed from "@/Components/HeaderAuthed.vue";
</script>

<template>
    <div>

        <div class="min-h-screen bg-brand-background">

            <HeaderAuthed />
            
            <!-- Page Heading -->
            <header v-if="$slots.header">
                <div class="max-w-7xl mx-auto text-center py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <div class="container w-full mt-6">
                <slot />
            </div>
        </div>
    </div>
</template>
