<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Public/Home', [
            'featuredBooks' => [
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
            'recentPosts' => [
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
