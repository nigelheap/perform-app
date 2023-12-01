<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {Link, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    name: '',
    expire_at: null,
});

defineProps({ classSession: Object })

const submit = () => {
    form.post(route('cursos.store'));
};

</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear sesión de clase</h2>
        </template>

        <form @submit.prevent="submit" class="bg-white p-4 rounded shadow">
            <div>
                <InputLabel for="email" value="name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    placeholder="Name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Fecha de entrega" />

                <TextInput
                    id="expire_at"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.expire_at"
                    placeholder="Fecha de entrega"
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
