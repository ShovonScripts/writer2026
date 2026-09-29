<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
class PostController extends Controller { public function index(): Response { return Inertia::render('Admin/Posts/Index',['posts'=>Post::with('category')->latest()->paginate(15)]); } public function create(): Response { return Inertia::render('Admin/Posts/Create',['categories'=>Category::where('type','post')->get()]); } public function store(Request $r): RedirectResponse { $d=$this->data($r); $d['slug']=$this->slug($d['slug']??$d['title_en']); Post::create($d); return redirect()->route('admin.posts.index')->with('success','পোস্ট সংরক্ষণ করা হয়েছে।'); } public function edit(Post $post): Response { return Inertia::render('Admin/Posts/Edit',['post'=>$post,'categories'=>Category::where('type','post')->get()]); } public function update(Request $r,Post $post): RedirectResponse { $d=$this->data($r); $d['slug']=$this->slug($d['slug']??$d['title_en'],$post->id); $post->update($d); return redirect()->route('admin.posts.index')->with('success','পোস্ট আপডেট করা হয়েছে।'); } public function destroy(Post $post): RedirectResponse { $post->delete(); return back(); } private function data(Request $r):array { $d=$r->validate(['title_bn'=>'required|string|max:255','title_en'=>'required|string|max:255','slug'=>'nullable|string|max:255','content_bn'=>'required|string','content_en'=>'required|string','excerpt_bn'=>'nullable|string|max:255','excerpt_en'=>'nullable|string|max:255','featured_image'=>'nullable|string|max:255','category_id'=>'nullable|exists:categories,id','published_at'=>'nullable|date','status'=>'required|in:draft,published']); if($d['status']==='published'&&!$d['published_at'])$d['published_at']=now(); return $d; } private function slug(string $v,?int $ignore=null):string { $s=Str::slug($v)?:'post';$b=$s;$i=1;while(Post::where('slug',$s)->when($ignore,fn($q)=>$q->where('id','!=',$ignore))->exists())$s=$b.'-'.(++$i);return $s; } }
