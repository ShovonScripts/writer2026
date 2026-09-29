<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
class ContactMessageController extends Controller { public function index():Response { return Inertia::render('Admin/Messages/Index',['messages'=>ContactMessage::latest()->paginate(20)]); } public function update(ContactMessage $contactMessage):RedirectResponse { $contactMessage->update(['is_read'=>true]); return back(); } public function destroy(ContactMessage $contactMessage):RedirectResponse {$contactMessage->delete();return back();} }
