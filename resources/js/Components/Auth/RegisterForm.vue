<script setup>
import TextInput from "@/Components/Form/TextInput.vue";
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import InputError from "@/Components/Form/InputError.vue";
import {Link, useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/Form/InputLabel.vue";
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register.post'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <form @submit.prevent="submit">
        <h2 class="mb-4 text-center text-3xl font-bold text-brand-orange uppercase tracking-widest">Registro</h2>

        <div>
            <InputLabel for="register-name" class="sr-only" value="Nombre Completo" />

            <TextInput
                id="register-name"
                type="text"
                class="mt-1 block w-full bg-brand-background"
                v-model="form.name"
                placeholder="Nombre Completo"
                required
                autofocus
                autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
            <InputLabel for="register-email" class="sr-only" value="Correo" />

            <TextInput
                id="register-email"
                type="email"
                class="mt-1 block w-full bg-brand-background"
                v-model="form.email"
                placeholder="Correo"
                required
                autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
            <InputLabel for="register-password"  class="sr-only" value="Clave" />

            <TextInput
                id="register-password"
                type="password"
                class="mt-1 block w-full bg-brand-background"
                v-model="form.password"
                placeholder="Clave"
                required
                autocomplete="new-password"
            />

            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
            <InputLabel for="register-password-confirmation" class="sr-only" value="Confirmar clave" />

            <TextInput
                id="register-password-confirmation"
                type="password"
                class="mt-1 block w-full bg-brand-background"
                v-model="form.password_confirmation"
                placeholder="Confirmar clave"
                required
                autocomplete="new-password"
            />

            <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

        <div class="flex items-center justify-stretch mt-8">
            <SecondaryButton
                type="submit"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Registrarse
            </SecondaryButton>
        </div>
    </form>
</template>
