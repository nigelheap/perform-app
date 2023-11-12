<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen py-8 bg-brand-background">
        <div class="container mb-8">
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>
        <div class="container w-full sm:max-w-md mt-6">
            <slot />
        </div>
    </div>
</template>
