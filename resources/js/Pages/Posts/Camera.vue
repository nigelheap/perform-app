<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import BackToCurso from "@/Components/BackToCurso.vue";
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import InputError from "@/Components/Form/InputError.vue";
import InputLabel from "@/Components/Form/InputLabel.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import TextArea from "@/Components/Form/TextArea.vue";
import Camera from "simple-vue-camera";


defineProps({ curso: Object })

const form = useForm({
    title: '',
    description: '',
    file: null,
    cameraFile: null
});


const submit = () => {
    form.post(route('posts.store', {
        type: props.type,
        curso: props.curso.id
    }));
};

// Use camera reference to call functions
const snapshot = async () => {
    const blob = await camera.value?.snapshot();

    // To show the screenshot with an image tag, create a url
    const url = URL.createObjectURL(blob);
}



</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Foto</h2>
        </template>

        <BackToCurso :curso="curso" />


        <form @submit.prevent="submit" class="bg-white p-4 rounded shadow">

            <div class="mt-4">
                <input type="file" @input="form.file = $event.target.files[0]" />
            </div>

            <div class="mt-4">

                <div class="mx-auto relative pb-[57%] overflow-hidden">
                    <div class="absolute">
                        <camera :resolution="{ width: 1024, height: 600 }"
                                class="absolute top-0 w-full"
                                ref="camera"
                                autoplay></camera>
                    </div>
                </div>
                <button @click="snapshot">Create snapshot</button>

            </div>

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

            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>

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
