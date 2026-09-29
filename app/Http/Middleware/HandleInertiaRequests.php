<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $settings = Schema::hasTable('settings') ? Setting::query()->pluck('value', 'key') : collect();
        $setting = fn (string $key, mixed $default = null) => $settings->get($key, $default);

        return array_merge(parent::share($request), [
            'site' => [
                'name' => $setting('site_name', config('app.name')),
                'title' => $setting('seo_default_title', config('app.name')),
                'description' => $setting('seo_default_description', 'Stories, books and writing from the author.'),
                'keywords' => $setting('seo_keywords', 'author, books, writing, literature'),
                'image' => $setting('seo_og_image'),
                'twitter' => $setting('twitter_handle'),
                'google_site_verification' => $setting('google_site_verification'),
            ],
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
            ],
        ]);
    }
}
