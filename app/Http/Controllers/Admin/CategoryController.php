<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
class CategoryController extends Controller { public function index(): Response { return Inertia::render('Admin/Categories/Index',['categories'=>Category::withCount(['books','posts'])->orderBy('type')->get()]); } public function store(Request $r):RedirectResponse { $d=$r->validate(['name_bn'=>'required|string|max:255','name_en'=>'required|string|max:255','slug'=>'nullable|string|max:255','type'=>'required|in:book,post']);$d['slug']=Str::slug($d['slug']?:$d['name_en']);Category::create($d);return back(); } public function update(Request $r,Category $category):RedirectResponse {$d=$r->validate(['name_bn'=>'required|string|max:255','name_en'=>'required|string|max:255','slug'=>'nullable|string|max:255','type'=>'required|in:book,post']);$d['slug']=Str::slug($d['slug']?:$d['name_en']);$category->update($d);return back();} public function destroy(Category $category):RedirectResponse {if($category->books()->exists()||$category->posts()->exists())return back()->withErrors(['category'=>'এই ক্যাটাগরিতে কনটেন্ট আছে।']);$category->delete();return back();} }
