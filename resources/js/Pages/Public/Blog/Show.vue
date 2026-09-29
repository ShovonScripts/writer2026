<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ post: Object });
</script>
<template><main class="min-h-screen bg-[#f7f5f0] px-6 py-16 text-[#182b2a] lg:px-10"><article class="mx-auto max-w-3xl"><Link href="/blog" class="text-sm text-[#c56b4d]">← সব লেখা</Link><p class="mt-16 text-xs text-[#87938d]">{{ post.published_at }}</p><h1 class="mt-4 font-serif text-5xl leading-tight">{{ post.title_bn }}</h1><div class="prose prose-lg mt-10 max-w-none leading-8 text-[#60716c]" v-html="post.content_bn"></div></article></main></template>
