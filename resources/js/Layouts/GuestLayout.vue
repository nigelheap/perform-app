<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import AudioIcon from "@/Components/Icons/AudioIcon.vue";
import CameraIcon from "@/Components/Icons/CameraIcon.vue";
import PinIcon from "@/Components/Icons/PinIcon.vue";
import WriteIcon from "@/Components/Icons/WriteIcon.vue";
</script>

<template>
    <div class="min-h-screen py-8 bg-brand-background">
        <div class="container mb-8">
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div class="container">
            <ul class="grid grid-cols-2 sm:grid-cols-4 gap-8">
                <li class="p-4"><CameraIcon /></li>
                <li class="p-4"><WriteIcon /></li>
                <li class="p-4"><AudioIcon /></li>
                <li class="p-4"><PinIcon /></li>
            </ul>
        </div>
        <div class="container w-full sm:max-w-md mt-6">
            <slot />
        </div>
    </div>
</template>
