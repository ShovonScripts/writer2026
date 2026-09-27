<script setup>
defineProps({
    appName: String,
});
</script>

<template>
    <main class="flex min-h-screen items-center justify-center bg-slate-50">
        <h1 class="text-3xl font-bold text-slate-800">
            {{ appName }} — Inertia + Vue + Tailwind OK
        </h1>
    </main>
</template>
