<script setup>
import TextInput from "@/Components/Form/TextInput.vue";
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import InputError from "@/Components/Form/InputError.vue";
import {Link, useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/Form/InputLabel.vue";
import LoginWithGoogle from "@/Components/Buttons/LoginWithGoogle.vue";
import LoginWithMicrosoft from "@/Components/Buttons/LoginWithMicrosoft.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: true,
});

const submit = () => {
    form.post(route('login.post'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
<template>
    <div>

        <div class="flex flex-col lg:flex-row gap-4 mb-8">
            <LoginWithGoogle :href="route('auth.provider.redirect', 'google')" />
            <LoginWithMicrosoft :href="route('auth.provider.redirect', 'microsoft')" />
        </div>

        <h2 class="mb-4 text-center text-3xl font-bold text-brand-blue uppercase tracking-widest">Login</h2>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" class="sr-only" value="Correo" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    placeholder="Correo"
                    required
                    autofocus
                    autocomplete="one-time-code"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" class="sr-only" value="Clave" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    placeholder="Clave"
                    required
                    autocomplete="one-time-code"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="hover:underline tracking-widest uppercase font-medium text-brand-blue"
                >
                    Olvidé contraseña
                </Link>
            </div>

            <div class="flex items-center justify-stretch mt-4">

                <PrimaryButton
                    type="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </div>
</template>

