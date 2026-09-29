<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Inertia\Inertia;
use Inertia\Response;
class PageController extends Controller { public function show(string $slug): Response { $page=Page::where('slug',$slug)->firstOrFail(); return Inertia::render('Public/'.ucfirst($slug),['page'=>$page]); } }
