<script setup>
import { useForm } from '@inertiajs/vue3';
const form=useForm({email:'',password:'',remember:false});
const submit=()=>form.post('/admin/login');
</script>
<template><main class="flex min-h-screen items-center justify-center bg-[#f7f5f0] px-6"><form @submit.prevent="submit" class="w-full max-w-md rounded-2xl bg-white p-8 shadow-sm"><h1 class="font-serif text-3xl text-[#182b2a]">Administrator Sign in</h1><div class="mt-8 space-y-4"><input v-model="form.email" type="email" required placeholder="Email" class="w-full rounded-lg border-0 bg-[#f7f5f0] px-4 py-3 ring-1 ring-[#dfe1d8]" /><input v-model="form.password" type="password" required placeholder="Password" class="w-full rounded-lg border-0 bg-[#f7f5f0] px-4 py-3 ring-1 ring-[#dfe1d8]" /><label class="flex gap-2 text-sm text-[#718079]"><input v-model="form.remember" type="checkbox" /> Remember me</label></div><button class="mt-7 w-full rounded-full bg-[#1d4843] py-3 font-semibold text-white">Sign in</button><p v-if="form.errors.email" class="mt-3 text-sm text-red-600">{{ form.errors.email }}</p></form></main></template>
