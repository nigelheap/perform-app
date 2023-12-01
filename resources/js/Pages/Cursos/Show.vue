<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AddPostsIcons from "@/Components/AddPostsIcons.vue";
import EscribeSummary from "@/Components/Posts/Summaries/EscribeSummary.vue";
import Avatar from "@/Components/Icons/Avatar.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
    curso: Object
})


const typeToDesc = (type) =>{
    return {
        escribe: 'texto',
        geo: 'una punta en la mapa',
        foto: 'una foto',
    }[type]
}

</script>
<template>
    <Head :title="curso.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ curso.name }}</h2>
        </template>

        <AddPostsIcons :curso="curso" />

        <ul role="list" class="space-y-6 mt-4" v-if="curso.posts.length > 0">
            <li v-for="(post, index) in curso.posts" :key="post.id" class="relative flex gap-x-4">
                <div :class="[index === curso.posts.length - 1 ? 'h-6' : '-bottom-6', 'absolute left-0 top-0 flex w-6 justify-center']">
                    <div class="w-px bg-gray-200" />
                </div>

                <Avatar :name="post.user.name" alt="" class="relative mt-3 h-6 w-6 flex-none rounded-full bg-gray-50" />
                <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200 bg-white">
                    <div class="flex justify-between gap-x-4">
                        <div class="py-0.5 text-xs leading-5 text-gray-500">
                            <span class="font-medium text-gray-900">{{ post.user.name }}</span> agregó {{ typeToDesc(post.type) }}
                        </div>
                        <time :datetime="$date(post.created_at).fromNow()" class="flex-none py-0.5 text-xs leading-5 text-gray-500">{{ $date(post.created_at).fromNow() }}</time>
                    </div>
                    <h3 v-text="post.title"></h3>
                    <EscribeSummary v-if="post.type === 'escribe'" :post="post"></EscribeSummary>
                </div>
            </li>
        </ul>

    </AuthenticatedLayout>
</template>
