<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class PageController extends Controller { public function index():Response{return Inertia::render('Admin/Pages/Index',['pages'=>Page::orderBy('slug')->get()]);} public function edit(Page $page):Response{return Inertia::render('Admin/Pages/Edit',['page'=>$page]);} public function update(Request $r,Page $page):RedirectResponse{$page->update($r->validate(['title_bn'=>'required|string|max:255','title_en'=>'required|string|max:255','content_bn'=>'required|string','content_en'=>'required|string']));return redirect()->route('admin.pages.index')->with('success','পেজ আপডেট করা হয়েছে।');} }
