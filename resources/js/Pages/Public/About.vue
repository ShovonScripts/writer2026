<script setup>
import { Link } from '@inertiajs/vue3';
import SeoHead from '../../Components/SeoHead.vue';
defineProps({ page: Object });
</script>
<template><SeoHead title="About the author" /><main class="min-h-screen bg-[#f7f5f0] px-6 py-16 text-[#182b2a] lg:px-10"><div class="mx-auto max-w-3xl"><Link href="/" class="text-sm text-[#c56b4d]">← হোম</Link><h1 class="mt-16 font-serif text-5xl">{{ page.title_bn }}</h1><div class="prose prose-lg mt-10 max-w-none leading-8 text-[#60716c]" v-html="page.content_bn"></div></div></main></template>
