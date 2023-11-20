<script setup>
import PinIcon from "@/Components/Icons/PinIcon.vue";
import AudioIcon from "@/Components/Icons/AudioIcon.vue";
import CameraIcon from "@/Components/Icons/CameraIcon.vue";
import WriteIcon from "@/Components/Icons/WriteIcon.vue";
import { Link } from '@inertiajs/vue3';

defineProps({ curso: Object })
</script>
<template>
    <div class="container">
        <ul class="grid grid-cols-2 sm:grid-cols-4 gap-8">
            <li class="p-4">
                <Link :href="route('posts.create', {type: 'camera', curso: curso.id})">
                    <CameraIcon />
                </Link>
            </li>
            <li class="p-4">
                <Link :href="route('posts.create', {type: 'escribe', curso: curso.id})">
                    <WriteIcon />
                </Link>
            </li>
            <li class="p-4">
                <Link :href="route('posts.create', {type: 'audio', curso: curso.id})">
                    <AudioIcon />
                </Link>
            </li>
            <li class="p-4">
                <Link :href="route('posts.create', {type: 'geo', curso: curso.id})">
                    <PinIcon />
                </Link>
            </li>
        </ul>
    </div>
</template>
