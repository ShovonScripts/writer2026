<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ books: Object, categories: Array });
</script>
<template>
  <main class="min-h-screen bg-[#f7f5f0] px-6 py-16 text-[#182b2a] lg:px-10"><div class="mx-auto max-w-7xl"><Link href="/" class="text-sm text-[#c56b4d]">← হোম</Link><p class="mt-14 text-xs font-bold uppercase tracking-[.25em] text-[#c56b4d]">প্রকাশনা</p><h1 class="mt-3 font-serif text-5xl">বইয়ের তাক</h1><div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"><article v-for="book in books.data" :key="book.id" class="rounded-2xl bg-white p-5 shadow-sm"><div class="flex aspect-[4/3] items-center justify-center rounded-xl bg-[#d5ded5] p-8 text-center font-serif text-2xl text-[#1d4843]">{{ book.title_bn }}</div><p class="mt-5 text-xs text-[#c56b4d]">{{ book.published_year || 'প্রকাশিত' }}</p><h2 class="mt-2 font-serif text-2xl">{{ book.title_bn }}</h2><p class="mt-2 text-sm leading-6 text-[#718079]">{{ book.description_bn }}</p><Link :href="`/books/${book.slug}`" class="mt-5 inline-block text-sm font-semibold text-[#1d4843]">বিস্তারিত →</Link></article></div><p v-if="!books.data?.length" class="py-20 text-center text-[#718079]">শীঘ্রই বই যোগ করা হবে।</p></div></main>
</template>
