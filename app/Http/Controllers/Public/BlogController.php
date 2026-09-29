<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class BlogController extends Controller { public function index(Request $request): Response { return Inertia::render('Public/Blog/Index',['posts'=>Post::with('category')->where('status','published')->whereNotNull('published_at')->latest('published_at')->paginate(10)->withQueryString()]); } public function show(Post $post): Response { abort_unless($post->status==='published',404); return Inertia::render('Public/Blog/Show',['post'=>$post->load('category')]); } }
