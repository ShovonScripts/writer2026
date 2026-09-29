<script setup>
defineProps({
    featuredBooks: {
        type: Array,
        default: () => [],
    },
    recentPosts: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <div class="min-h-screen bg-[#f7f5f0] text-[#182b2a]">
        <header class="mx-auto flex max-w-7xl items-center justify-between px-6 py-7 lg:px-10">
            <a href="/" class="font-serif text-2xl font-semibold tracking-tight">লেখকের খাতা<span class="text-[#c56b4d]">.</span></a>
            <nav class="hidden items-center gap-8 text-sm font-medium text-[#49605c] md:flex">
                <a href="#books" class="transition hover:text-[#c56b4d]">বই</a>
                <a href="#writing" class="transition hover:text-[#c56b4d]">লেখালেখি</a>
                <a href="#about" class="transition hover:text-[#c56b4d]">পরিচিতি</a>
                <a href="#contact" class="transition hover:text-[#c56b4d]">যোগাযোগ</a>
                <span class="border-l border-[#d6d8cf] pl-8 text-xs tracking-[0.2em]">EN</span>
            </nav>
            <button class="rounded-full border border-[#cbd2c7] px-4 py-2 text-xs font-semibold tracking-wide text-[#49605c] md:hidden" aria-label="মেনু খুলুন">মেনু</button>
        </header>

        <main>
            <section class="mx-auto grid max-w-7xl gap-12 px-6 pb-24 pt-14 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-10 lg:pt-20">
                <div>
                    <p class="mb-7 text-xs font-bold uppercase tracking-[0.28em] text-[#c56b4d]">শব্দের ভেতর দিয়ে</p>
                    <h1 class="max-w-2xl font-serif text-5xl leading-[1.06] tracking-tight text-[#182b2a] sm:text-6xl lg:text-7xl">গল্পেরা থাকে,<br /><span class="text-[#c56b4d]">শুধু বলা বাকি।</span></h1>
                    <p class="mt-8 max-w-lg text-lg leading-8 text-[#60716c]">আমি লিখি মানুষের কথা, শহরের কথা, আর সেইসব অনুভূতির কথা—যেগুলো আমাদের নীরবে বদলে দেয়।</p>
                    <div class="mt-10 flex flex-wrap items-center gap-5">
                        <a href="#books" class="rounded-full bg-[#1d4843] px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#1d4843]/15 transition hover:-translate-y-0.5 hover:bg-[#153a36]">বইগুলো দেখুন <span class="ml-2">↗</span></a>
                        <a href="#about" class="text-sm font-semibold text-[#49605c] underline decoration-[#c56b4d] decoration-2 underline-offset-8">আমার সম্পর্কে</a>
                    </div>
                    <div class="mt-16 flex gap-12 border-t border-[#dfe1d8] pt-6">
                        <div><p class="font-serif text-3xl">০৬</p><p class="mt-1 text-xs text-[#7c8982]">প্রকাশিত বই</p></div>
                        <div><p class="font-serif text-3xl">১২+</p><p class="mt-1 text-xs text-[#7c8982]">বছর লেখালেখি</p></div>
                        <div><p class="font-serif text-3xl">২৫k</p><p class="mt-1 text-xs text-[#7c8982]">পাঠক</p></div>
                    </div>
                </div>
                <div class="relative mx-auto w-full max-w-md lg:justify-self-end">
                    <div class="absolute -right-4 -top-5 h-28 w-28 rounded-full bg-[#e6b36d]/40 blur-sm"></div>
                    <div class="relative aspect-[4/5] overflow-hidden rounded-[10rem_10rem_1.5rem_1.5rem] bg-[#d5ded5]">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#cedcd5] via-[#aec5bd] to-[#6a8a80]"></div>
                        <div class="absolute bottom-0 left-1/2 h-[78%] w-[65%] -translate-x-1/2 rounded-t-[9rem] bg-[#e8d6c2]"></div>
                        <div class="absolute bottom-[43%] left-1/2 h-40 w-40 -translate-x-1/2 rounded-full bg-[#c9926d]"></div>
                        <div class="absolute bottom-0 left-1/2 h-[48%] w-[90%] -translate-x-1/2 rounded-t-[50%] bg-[#1d4843]"></div>
                        <div class="absolute left-8 top-8 rounded-full bg-[#f7f5f0]/80 px-4 py-2 text-xs font-medium tracking-wide text-[#49605c]">লেখক · পাঠক · গল্প</div>
                    </div>
                    <p class="mt-4 text-right font-serif text-sm italic text-[#7c8982]">“শব্দই আমার ঘর।”</p>
                </div>
            </section>

            <section id="books" class="bg-[#1d4843] px-6 py-20 text-[#f7f5f0] lg:px-10">
                <div class="mx-auto max-w-7xl">
                    <div class="mb-12 flex flex-wrap items-end justify-between gap-6">
                        <div><p class="mb-3 text-xs font-bold uppercase tracking-[0.25em] text-[#e6b36d]">নির্বাচিত কাজ</p><h2 class="font-serif text-4xl sm:text-5xl">বইয়ের তাক থেকে</h2></div>
                        <a href="/books" class="text-sm text-[#d7e1d8] underline decoration-[#e6b36d] underline-offset-8">সব বই দেখুন ↗</a>
                    </div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <article v-for="(book, index) in featuredBooks" :key="book.title" class="group flex min-h-64 gap-6 rounded-2xl border border-white/10 bg-white/[0.07] p-6 transition hover:bg-white/[0.12]">
                            <div class="flex w-28 shrink-0 items-center justify-center rounded-lg bg-gradient-to-br p-3 text-center shadow-xl" :class="index === 0 ? 'from-[#d18a65] to-[#7e443b]' : 'from-[#d5c09a] to-[#897658]'"><span class="font-serif text-xl leading-tight text-white">{{ book.title }}</span></div>
                            <div class="flex flex-1 flex-col"><p class="text-xs tracking-wide text-[#e6b36d]">{{ book.genre }} · {{ book.year }}</p><h3 class="mt-3 font-serif text-2xl">{{ book.title }}</h3><p class="mt-3 text-sm leading-6 text-[#c5d3ca]">{{ book.description }}</p><a href="/books" class="mt-auto pt-5 text-xs font-semibold text-white">বইটি সম্পর্কে জানুন <span class="ml-2 transition group-hover:ml-3">→</span></a></div>
                        </article>
                    </div>
                </div>
            </section>

            <section id="writing" class="mx-auto max-w-7xl px-6 py-24 lg:px-10">
                <div class="grid gap-14 lg:grid-cols-[0.8fr_1.2fr]">
                    <div><p class="mb-3 text-xs font-bold uppercase tracking-[0.25em] text-[#c56b4d]">জার্নাল</p><h2 class="font-serif text-4xl leading-tight sm:text-5xl">ভাবনা, নোট<br />আর কিছু গল্প</h2><p class="mt-6 max-w-sm leading-7 text-[#718079]">লেখালেখি, পড়াশোনা আর প্রতিদিনের দেখা পৃথিবী নিয়ে আমার ব্যক্তিগত নোট।</p><a href="/blog" class="mt-8 inline-block text-sm font-semibold text-[#1d4843] underline decoration-[#c56b4d] decoration-2 underline-offset-8">সব লেখা পড়ুন ↗</a></div>
                    <div class="divide-y divide-[#dfe1d8] border-y border-[#dfe1d8]">
                        <article v-for="post in recentPosts" :key="post.title" class="group py-7"><div class="flex items-center justify-between gap-4 text-xs text-[#87938d]"><span>{{ post.category }}</span><span>{{ post.date }}</span></div><h3 class="mt-3 font-serif text-2xl transition group-hover:text-[#c56b4d]">{{ post.title }}</h3><p class="mt-2 text-sm leading-6 text-[#718079]">{{ post.excerpt }}</p></article>
                    </div>
                </div>
            </section>

            <section id="about" class="border-t border-[#dfe1d8] bg-[#ebe9e1] px-6 py-20 text-center lg:px-10"><p class="mx-auto max-w-2xl font-serif text-3xl leading-snug text-[#1d4843] sm:text-4xl">“একজন লেখক আসলে সারাজীবন ধরে<br class="hidden sm:block" /> মানুষের মন পড়তে শেখে।”</p><p class="mt-6 text-sm text-[#718079]">— লেখকের খাতা</p></section>
        </main>

        <footer id="contact" class="bg-[#182b2a] px-6 py-12 text-[#d7e1d8] lg:px-10"><div class="mx-auto flex max-w-7xl flex-col justify-between gap-8 sm:flex-row sm:items-end"><div><p class="font-serif text-2xl text-white">লেখকের খাতা<span class="text-[#e6b36d]">.</span></p><p class="mt-3 text-sm text-[#91aaa0]">গল্পের সঙ্গে থাকুন।</p></div><div class="text-left text-sm sm:text-right"><p class="text-[#91aaa0]">যোগাযোগ</p><a href="mailto:hello@example.com" class="mt-2 inline-block text-white hover:text-[#e6b36d]">hello@example.com</a><p class="mt-6 text-xs text-[#718b82]">© {{ new Date().getFullYear() }} লেখকের খাতা</p></div></div></footer>
    </div>
</template>
