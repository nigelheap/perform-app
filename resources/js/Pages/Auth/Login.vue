<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import LoginForm from "@/Components/Auth/LoginForm.vue";
import RegisterForm from "@/Components/Auth/RegisterForm.vue";
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>
<template>
    <GuestLayout>
        <Head title="Log in o Registrar" />
        <div class="md:px-6 py-4 mb-8">
            <LoginForm
                :can-reset-password="canResetPassword"
                :status="status" />
        </div>
        <div class="md:px-6 py-4 mb-8">
            <RegisterForm />
        </div>
    </GuestLayout>
</template>
