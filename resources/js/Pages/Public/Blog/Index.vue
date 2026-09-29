<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ posts: Object });
</script>
<template><main class="min-h-screen bg-[#f7f5f0] px-6 py-16 text-[#182b2a] lg:px-10"><div class="mx-auto max-w-4xl"><Link href="/" class="text-sm text-[#c56b4d]">← হোম</Link><p class="mt-14 text-xs font-bold uppercase tracking-[.25em] text-[#c56b4d]">জার্নাল</p><h1 class="mt-3 font-serif text-5xl">লেখালেখি ও ভাবনা</h1><div class="mt-12 divide-y divide-[#dfe1d8] border-y border-[#dfe1d8]"><article v-for="post in posts.data" :key="post.id" class="py-8"><p class="text-xs text-[#87938d]">{{ post.published_at }}</p><Link :href="`/blog/${post.slug}`" class="mt-3 block font-serif text-3xl hover:text-[#c56b4d]">{{ post.title_bn }}</Link><p class="mt-3 leading-7 text-[#718079]">{{ post.excerpt_bn }}</p></article></div><p v-if="!posts.data?.length" class="py-20 text-center text-[#718079]">শীঘ্রই লেখা প্রকাশিত হবে।</p></div></main></template>
