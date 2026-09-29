<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class BookController extends Controller { public function index(Request $request): Response { $books=Book::with('category')->where('status','published')->when($request->string('genre')->toString(), fn($q,$genre)=>$q->whereHas('category',fn($c)=>$c->where('slug',$genre)))->latest()->paginate(12)->withQueryString(); return Inertia::render('Public/Books/Index',['books'=>$books,'categories'=>Category::where('type','book')->orderBy('name_en')->get()]); } public function show(Book $book): Response { abort_unless($book->status==='published',404); return Inertia::render('Public/Books/Show',['book'=>$book->load(['category','links'])]); } }
