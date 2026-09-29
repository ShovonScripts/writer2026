<script setup>
import { Link, useForm } from '@inertiajs/vue3';
defineProps({ page: Object });
const form = useForm({ name: '', email: '', message: '' });
const submit = () => form.post('/contact');
</script>
<template><main class="min-h-screen bg-[#f7f5f0] px-6 py-16 text-[#182b2a] lg:px-10"><div class="mx-auto max-w-4xl"><Link href="/" class="text-sm text-[#c56b4d]">← হোম</Link><div class="mt-16 grid gap-14 md:grid-cols-2"><div><h1 class="font-serif text-5xl">যোগাযোগ</h1><p class="mt-6 leading-8 text-[#60716c]">আপনার কথা, মতামত বা কাজের প্রস্তাব জানাতে লিখুন।</p></div><form class="space-y-5" @submit.prevent="submit"><input v-model="form.name" required placeholder="আপনার নাম" class="w-full rounded-lg border-0 bg-white px-4 py-3 ring-1 ring-[#dfe1d8] outline-none focus:ring-[#c56b4d]" /><input v-model="form.email" required type="email" placeholder="ইমেইল" class="w-full rounded-lg border-0 bg-white px-4 py-3 ring-1 ring-[#dfe1d8] outline-none focus:ring-[#c56b4d]" /><textarea v-model="form.message" required rows="6" placeholder="আপনার বার্তা" class="w-full rounded-lg border-0 bg-white px-4 py-3 ring-1 ring-[#dfe1d8] outline-none focus:ring-[#c56b4d]"></textarea><button :disabled="form.processing" class="rounded-full bg-[#1d4843] px-7 py-3 text-sm font-semibold text-white">বার্তা পাঠান</button></form></div></div></main></template>
