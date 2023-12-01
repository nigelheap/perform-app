<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import InputError from "@/Components/Form/InputError.vue";
import InputLabel from "@/Components/Form/InputLabel.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import TextArea from "@/Components/Form/TextArea.vue";

const props = defineProps({
    curso: Object,
    type: String
})

const form = useForm({
    title: '',
    description: '',
});


const submit = () => {
    form.post(route('posts.store', {
        type: props.type,
        curso: props.curso.id
    }));
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Escribir</h2>
        </template>

        <form @submit.prevent="submit" class="bg-white p-4 rounded shadow">
            <div>
                <InputLabel for="title" value="Titilo" class="sr-only" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    placeholder="Title"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Texto"  class="sr-only" />

                <TextArea
                    id="description"
                    type="date"
                    class="mt-1 block w-full min-h-[300px]"
                    v-model="form.description"
                    placeholder="Texto"
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.expire_at" />
            </div>


            <div class="flex items-center justify-stretch mt-4">
                <PrimaryButton
                    type="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Agregar
                </PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
