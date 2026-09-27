# রাউট লিস্ট

## পাবলিক রাউট (web.php)

| Method | URL | Controller@Method | Inertia Page |
|---|---|---|---|
| GET | `/` | `Public\HomeController@index` | `Public/Home.vue` |
| GET | `/books` | `Public\BookController@index` | `Public/Books/Index.vue` |
| GET | `/books/{book:slug}` | `Public\BookController@show` | `Public/Books/Show.vue` |
| GET | `/blog` | `Public\BlogController@index` | `Public/Blog/Index.vue` |
| GET | `/blog/{post:slug}` | `Public\BlogController@show` | `Public/Blog/Show.vue` |
| GET | `/about` | `Public\PageController@show('about')` | `Public/About.vue` |
| GET | `/contact` | `Public\PageController@show('contact')` | `Public/Contact.vue` |
| POST | `/contact` | `Public\ContactController@store` | — (redirect back) |
| GET | `/lang/{locale}` | `LocaleController@switch` | ভাষা টগল (bn/en) |

## অ্যাডমিন রাউট (routes/admin.php, middleware: auth)

| Method | URL | Controller@Method | Inertia Page |
|---|---|---|---|
| GET | `/admin/login` | `Auth\LoginController@create` | `Auth/Login.vue` |
| POST | `/admin/login` | `Auth\LoginController@store` | — |
| POST | `/admin/logout` | `Auth\LoginController@destroy` | — |
| GET | `/admin/dashboard` | `Admin\DashboardController@index` | `Admin/Dashboard.vue` |
| GET | `/admin/books` | `Admin\BookController@index` | `Admin/Books/Index.vue` |
| GET | `/admin/books/create` | `Admin\BookController@create` | `Admin/Books/Create.vue` |
| POST | `/admin/books` | `Admin\BookController@store` | — |
| GET | `/admin/books/{book}/edit` | `Admin\BookController@edit` | `Admin/Books/Edit.vue` |
| PUT | `/admin/books/{book}` | `Admin\BookController@update` | — |
| DELETE | `/admin/books/{book}` | `Admin\BookController@destroy` | — |
| GET | `/admin/posts` | `Admin\PostController@index` | `Admin/Posts/Index.vue` |
| GET | `/admin/posts/create` | `Admin\PostController@create` | `Admin/Posts/Create.vue` |
| POST | `/admin/posts` | `Admin\PostController@store` | — |
| GET | `/admin/posts/{post}/edit` | `Admin\PostController@edit` | `Admin/Posts/Edit.vue` |
| PUT | `/admin/posts/{post}` | `Admin\PostController@update` | — |
| DELETE | `/admin/posts/{post}` | `Admin\PostController@destroy` | — |
| GET | `/admin/categories` | `Admin\CategoryController@index` | `Admin/Categories/Index.vue` |
| POST | `/admin/categories` | `Admin\CategoryController@store` | — |
| PUT | `/admin/categories/{category}` | `Admin\CategoryController@update` | — |
| DELETE | `/admin/categories/{category}` | `Admin\CategoryController@destroy` | — |
| GET | `/admin/pages` | `Admin\PageController@index` | `Admin/Pages/Index.vue` |
| GET | `/admin/pages/{page}/edit` | `Admin\PageController@edit` | `Admin/Pages/Edit.vue` |
| PUT | `/admin/pages/{page}` | `Admin\PageController@update` | — |
| GET | `/admin/events` | `Admin\EventController@index` | `Admin/Events/Index.vue` |
| POST | `/admin/events` | `Admin\EventController@store` | — |
| PUT | `/admin/events/{event}` | `Admin\EventController@update` | — |
| DELETE | `/admin/events/{event}` | `Admin\EventController@destroy` | — |
| GET | `/admin/messages` | `Admin\ContactMessageController@index` | `Admin/Messages/Index.vue` |
| GET | `/admin/settings` | `Admin\SettingController@edit` | `Admin/Settings.vue` |
| PUT | `/admin/settings` | `Admin\SettingController@update` | — |

## নোট
- সব `/admin/*` রাউট `auth` মিডলওয়্যার দিয়ে প্রোটেক্টেড।
- যেহেতু সিঙ্গেল-ইউজার সিস্টেম, রোল/পারমিশন প্যাকেজ লাগবে না — সরাসরি `auth` মিডলওয়্যারই যথেষ্ট।
- Route Model Binding (`{book:slug}`, `{book}`) ব্যবহার করে ক্লিন কন্ট্রোলার কোড রাখা হয়েছে।
