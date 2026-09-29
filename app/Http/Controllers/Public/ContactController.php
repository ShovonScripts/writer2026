<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
class ContactController extends Controller { public function store(ContactRequest $request): RedirectResponse { ContactMessage::create($request->validated()); return back()->with('success','আপনার বার্তা পাঠানো হয়েছে।'); } }
