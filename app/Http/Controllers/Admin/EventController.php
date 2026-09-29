<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class EventController extends Controller { public function index():Response{return Inertia::render('Admin/Events/Index',['events'=>Event::orderBy('event_date','desc')->get()]);} public function store(Request $r):RedirectResponse{Event::create($r->validate(['title_bn'=>'required|string|max:255','title_en'=>'required|string|max:255','description_bn'=>'nullable|string','description_en'=>'nullable|string','event_date'=>'required|date','location'=>'nullable|string|max:255']));return back();} public function update(Request $r,Event $event):RedirectResponse{$event->update($r->validate(['title_bn'=>'required|string|max:255','title_en'=>'required|string|max:255','description_bn'=>'nullable|string','description_en'=>'nullable|string','event_date'=>'required|date','location'=>'nullable|string|max:255']));return back();} public function destroy(Event $event):RedirectResponse{$event->delete();return back();} }
