<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
class BookController extends Controller
{
    public function index(Request $request): Response { return Inertia::render('Admin/Books/Index',['books'=>Book::with('category')->latest()->paginate(15)->withQueryString()]); }
    public function create(): Response { return Inertia::render('Admin/Books/Create',['categories'=>Category::where('type','book')->get()]); }
    public function store(Request $request): RedirectResponse { $data=$this->validated($request); $data['slug']=$this->slug($data['slug'] ?? $data['title_en']); $book=Book::create($data); $this->syncLinks($book,$request->input('links',[])); return redirect()->route('admin.books.index')->with('success','বই সংরক্ষণ করা হয়েছে।'); }
    public function edit(Book $book): Response { return Inertia::render('Admin/Books/Edit',['book'=>$book->load('links'),'categories'=>Category::where('type','book')->get()]); }
    public function update(Request $request, Book $book): RedirectResponse { $data=$this->validated($request,$book); $data['slug']=$this->slug($data['slug'] ?? $data['title_en'],$book->id); $book->update($data); $this->syncLinks($book,$request->input('links',[])); return redirect()->route('admin.books.index')->with('success','বই আপডেট করা হয়েছে।'); }
    public function destroy(Book $book): RedirectResponse { $book->delete(); return back()->with('success','বই মুছে ফেলা হয়েছে।'); }
    private function validated(Request $request, ?Book $book=null): array { return $request->validate(['title_bn'=>'required|string|max:255','title_en'=>'required|string|max:255','slug'=>'nullable|string|max:255','description_bn'=>'required|string','description_en'=>'required|string','cover_image'=>'nullable|string|max:255','category_id'=>'nullable|exists:categories,id','published_year'=>'nullable|integer|min:1000|max:2200','is_featured'=>'boolean','status'=>'required|in:draft,published']); }
    private function slug(string $value, ?int $ignore=null): string { $slug=Str::slug($value); $base=$slug ?: 'book'; $i=1; while(Book::where('slug',$slug)->when($ignore,fn($q)=>$q->where('id','!=',$ignore))->exists()) $slug=$base.'-'.(++$i); return $slug; }
    private function syncLinks(Book $book,array $links): void { $book->links()->delete(); foreach($links as $i=>$link) if(!empty($link['platform_name'])&&!empty($link['url'])) $book->links()->create(['platform_name'=>$link['platform_name'],'url'=>$link['url'],'icon'=>$link['icon']??null,'sort_order'=>$i]); }
}
