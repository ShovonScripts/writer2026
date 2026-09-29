<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const props = defineProps({ title: { type: String, default: '' }, description: { type: String, default: '' }, image: { type: String, default: '' } });
const page = usePage();
const site = computed(() => page.props.site || {});
const fullTitle = computed(() => props.title ? `${props.title} | ${site.value.name || 'Author'}` : site.value.title);
const description = computed(() => props.description || site.value.description || 'Books, writing and stories from the author.');
</script>
<template><Head :title="fullTitle"><meta name="description" :content="description" /><meta name="keywords" :content="site.keywords" /><meta property="og:title" :content="fullTitle" /><meta property="og:description" :content="description" /><meta property="og:type" content="website" /><meta v-if="image || site.image" property="og:image" :content="image || site.image" /><meta v-if="site.twitter" name="twitter:site" :content="site.twitter" /><meta v-if="site.google_site_verification" name="google-site-verification" :content="site.google_site_verification" /><meta name="twitter:card" content="summary_large_image" /></Head></template>
