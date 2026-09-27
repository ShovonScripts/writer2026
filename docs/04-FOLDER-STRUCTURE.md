# ফোল্ডার স্ট্রাকচার (Laravel + Inertia + Vue)

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── BookController.php
│   │   │   ├── PostController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── PageController.php
│   │   │   ├── EventController.php
│   │   │   ├── ContactMessageController.php
│   │   │   └── SettingController.php
│   │   ├── Public/
│   │   │   ├── HomeController.php
│   │   │   ├── BookController.php
│   │   │   ├── BlogController.php
│   │   │   ├── PageController.php
│   │   │   └── ContactController.php
│   │   ├── Auth/
│   │   │   └── LoginController.php
│   │   └── LocaleController.php
│   ├── Requests/
│   │   ├── Admin/
│   │   │   ├── StoreBookRequest.php
│   │   │   ├── UpdateBookRequest.php
│   │   │   ├── StorePostRequest.php
│   │   │   └── UpdatePostRequest.php
│   │   └── ContactRequest.php
│   └── Middleware/
│       └── SetLocale.php
├── Models/
│   ├── User.php
│   ├── Book.php
│   ├── BookLink.php
│   ├── Post.php
│   ├── Category.php
│   ├── Event.php
│   ├── Page.php
│   ├── Setting.php
│   └── ContactMessage.php
└── Providers/

database/
├── migrations/
│   ├── xxxx_create_books_table.php
│   ├── xxxx_create_book_links_table.php
│   ├── xxxx_create_posts_table.php
│   ├── xxxx_create_categories_table.php
│   ├── xxxx_create_events_table.php
│   ├── xxxx_create_pages_table.php
│   ├── xxxx_create_settings_table.php
│   └── xxxx_create_contact_messages_table.php
└── seeders/
    ├── PageSeeder.php   (About/Contact ডিফল্ট কনটেন্ট)
    └── SettingSeeder.php

resources/
├── js/
│   ├── Pages/
│   │   ├── Admin/
│   │   │   ├── Dashboard.vue
│   │   │   ├── Books/
│   │   │   │   ├── Index.vue
│   │   │   │   ├── Create.vue
│   │   │   │   └── Edit.vue
│   │   │   ├── Posts/
│   │   │   │   ├── Index.vue
│   │   │   │   ├── Create.vue
│   │   │   │   └── Edit.vue
│   │   │   ├── Categories/Index.vue
│   │   │   ├── Pages/
│   │   │   │   ├── Index.vue
│   │   │   │   └── Edit.vue
│   │   │   ├── Events/Index.vue
│   │   │   ├── Messages/Index.vue
│   │   │   └── Settings.vue
│   │   ├── Public/
│   │   │   ├── Home.vue
│   │   │   ├── Books/
│   │   │   │   ├── Index.vue
│   │   │   │   └── Show.vue
│   │   │   ├── Blog/
│   │   │   │   ├── Index.vue
│   │   │   │   └── Show.vue
│   │   │   ├── About.vue
│   │   │   └── Contact.vue
│   │   └── Auth/
│   │       └── Login.vue
│   ├── Layouts/
│   │   ├── AdminLayout.vue
│   │   └── PublicLayout.vue
│   ├── Components/
│   │   ├── BookCard.vue
│   │   ├── PostCard.vue
│   │   ├── Pagination.vue
│   │   ├── LanguageSwitcher.vue
│   │   ├── RichTextEditor.vue      (TipTap wrapper)
│   │   └── BuyLinkButton.vue
│   ├── app.js
│   └── ssr.js                      (ঐচ্ছিক — SEO এর জন্য SSR সেটাপ করলে)
├── css/
│   └── app.css                      (Tailwind entry)
└── views/
    └── app.blade.php                (Inertia root template)

routes/
├── web.php          (পাবলিক রাউট)
├── admin.php         (অ্যাডমিন রাউট, auth middleware গ্রুপে)
└── auth.php

lang/
├── bn/
│   └── messages.php
└── en/
    └── messages.php
```

## মূল ডিজাইন সিদ্ধান্ত
- **পাবলিক ও অ্যাডমিন কন্ট্রোলার আলাদা namespace-এ** — কোড ক্লিন থাকে, দায়িত্ব স্পষ্ট থাকে।
- **`Layouts/AdminLayout.vue` ও `PublicLayout.vue`** — দুই সেকশনের UI সম্পূর্ণ আলাদা রাখার জন্য।
- **`Components/RichTextEditor.vue`** একটা reusable TipTap wrapper — পোস্ট ও বইয়ের বর্ণনা দুই জায়গাতেই ব্যবহারযোগ্য।
- **মাল্টি-ল্যাঙ্গুয়েজ** ডাটাবেজ কলাম লেভেলে হ্যান্ডল করা হয়েছে (`title_bn`/`title_en`) — আলাদা ট্রান্সলেশন টেবিলের বদলে সহজ অ্যাপ্রোচ, যেহেতু কন্টেন্টের ভলিউম বড় না।
