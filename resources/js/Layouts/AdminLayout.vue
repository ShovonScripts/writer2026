<script setup>
import { Link, router } from '@inertiajs/vue3';
const nav = [
  { label: 'ড্যাশবোর্ড', href: '/admin/dashboard', icon: '⌂' },
  { label: 'বই', href: '/admin/books', icon: '▣' },
  { label: 'পোস্ট', href: '/admin/posts', icon: '✎' },
  { label: 'ক্যাটাগরি', href: '/admin/categories', icon: '◈' },
  { label: 'স্ট্যাটিক পেজ', href: '/admin/pages', icon: '▤' },
  { label: 'ইভেন্ট', href: '/admin/events', icon: '◷' },
  { label: 'বার্তা', href: '/admin/messages', icon: '✉' },
  { label: 'সেটিংস', href: '/admin/settings', icon: '⚙' },
];
const logout = () => router.post('/admin/logout');
</script>
<template>
  <div class="min-h-screen bg-[#f7f5f0] text-[#182b2a] md:flex">
    <aside class="w-full shrink-0 bg-[#183f3b] p-5 text-[#d7e1d8] md:min-h-screen md:w-64 md:p-7">
      <Link href="/admin/dashboard" class="block border-b border-white/10 pb-7"><span class="font-serif text-2xl text-white">লেখকের খাতা<span class="text-[#e6b36d]">.</span></span><span class="mt-1 block text-[10px] uppercase tracking-[.25em] text-[#91aaa0]">কন্টেন্ট স্টুডিও</span></Link>
      <nav class="mt-7 grid grid-cols-2 gap-1 md:block md:space-y-1">
        <Link v-for="item in nav" :key="item.href" :href="item.href" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition hover:bg-white/10 hover:text-white" :class="$page.url.startsWith(item.href) ? 'bg-white/10 text-white' : 'text-[#b5c9bf]'"><span class="w-5 text-center text-[#e6b36d]">{{ item.icon }}</span>{{ item.label }}</Link>
      </nav>
      <div class="mt-8 border-t border-white/10 pt-5 md:mt-12"><Link href="/" class="block px-3 py-2 text-sm text-[#91aaa0] hover:text-white">↗ সাইট দেখুন</Link><button @click="logout" class="mt-2 px-3 py-2 text-sm text-[#91aaa0] hover:text-white">⇥ লগআউট</button></div>
    </aside>
    <section class="min-w-0 flex-1"><header class="flex h-20 items-center justify-between border-b border-[#dfe1d8] bg-[#f7f5f0] px-6 lg:px-10"><div><p class="text-xs text-[#87938d]">স্বাগতম</p><p class="font-semibold">আপনার কনটেন্ট স্টুডিও</p></div><span class="rounded-full bg-[#e5eee6] px-3 py-1 text-xs text-[#1d4843]">অ্যাডমিন</span></header><main class="p-6 lg:p-10"><slot /></main></section>
  </div>
</template>
