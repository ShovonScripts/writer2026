<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $featuredBooks = Book::with('category')->where('status', 'published')->where('is_featured', true)->latest()->take(2)->get()->map(fn (Book $book) => [
            'title' => $book->title_bn,
            'subtitle' => $book->title_en,
            'genre' => $book->category?->name_bn ?? 'বই',
            'year' => (string) ($book->published_year ?? ''),
            'description' => $book->description_bn,
        ])->all();
        $recentPosts = Post::where('status', 'published')->whereNotNull('published_at')->latest('published_at')->take(2)->get()->map(fn (Post $post) => [
            'title' => $post->title_bn,
            'date' => $post->published_at?->translatedFormat('j F, Y'),
            'category' => $post->category?->name_bn ?? 'লেখা',
            'excerpt' => $post->excerpt_bn,
        ])->all();

        return Inertia::render('Public/Home', [
            'featuredBooks' => $featuredBooks ?: [
                [
                    'title' => 'অচেনা শহরের গল্প',
                    'subtitle' => 'Stories from an unfamiliar city',
                    'genre' => 'উপন্যাস',
                    'year' => '২০২৪',
                    'description' => 'শহর, স্মৃতি আর মানুষের ভেতরের নীরব কথোপকথনের গল্প।',
                ],
                [
                    'title' => 'জলের অক্ষর',
                    'subtitle' => 'Letters in the Water',
                    'genre' => 'কবিতা',
                    'year' => '২০২২',
                    'description' => 'জীবনের ছোট ছোট মুহূর্তকে ছুঁয়ে থাকা কিছু কবিতা।',
                ],
            ],
            'recentPosts' => $recentPosts ?: [
                [
                    'title' => 'লেখার টেবিল থেকে',
                    'date' => '১২ সেপ্টেম্বর, ২০২৪',
                    'category' => 'চিন্তাভাবনা',
                    'excerpt' => 'একটি গল্প শুরু হওয়ার আগে তার ভেতরে কতগুলো নীরবতা জমে থাকে…',
                ],
                [
                    'title' => 'বই এবং পাঠকের মাঝখানে',
                    'date' => '২৮ আগস্ট, ২০২৪',
                    'category' => 'সাহিত্য',
                    'excerpt' => 'প্রতিটি বই তার পাঠকের কাছে গিয়ে নতুন করে জন্ম নেয়।',
                ],
            ],
        ]);
    }
}
