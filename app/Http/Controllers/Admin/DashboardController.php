<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\ContactMessage;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
class DashboardController extends Controller { public function index(): Response { return Inertia::render('Admin/Dashboard',['stats'=>['books'=>Book::count(),'posts'=>Post::count(),'unreadMessages'=>ContactMessage::where('is_read',false)->count()]]); } }
