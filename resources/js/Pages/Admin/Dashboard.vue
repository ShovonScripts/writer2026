<script setup>
import { Link, router } from '@inertiajs/vue3';
defineProps({stats:Object});
const logout=()=>router.post('/admin/logout');
</script>
<template><main class="min-h-screen bg-[#f7f5f0] px-6 py-10 text-[#182b2a] lg:px-10"><div class="mx-auto max-w-6xl"><header class="flex items-center justify-between"><div><p class="text-xs font-bold uppercase tracking-[.2em] text-[#c56b4d]">অ্যাডমিন</p><h1 class="mt-2 font-serif text-4xl">ড্যাশবোর্ড</h1></div><button @click="logout" class="text-sm text-[#c56b4d]">লগআউট</button></header><div class="mt-12 grid gap-5 sm:grid-cols-3"><div v-for="(value,key) in stats" :key="key" class="rounded-2xl bg-white p-6 shadow-sm"><p class="text-sm text-[#718079]">{{ key === 'books' ? 'বই' : key === 'posts' ? 'পোস্ট' : 'অপঠিত বার্তা' }}</p><p class="mt-3 font-serif text-4xl">{{ value }}</p></div></div><div class="mt-8 rounded-2xl bg-[#1d4843] p-8 text-white"><h2 class="font-serif text-2xl">কনটেন্ট ম্যানেজমেন্ট</h2><p class="mt-2 text-sm text-[#c5d3ca]">বই, পোস্ট, পেজ ও সেটিংস ম্যানেজমেন্ট পরবর্তী মডিউলে যুক্ত করা যাবে।</p></div></div></main></template>
