<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class SettingController extends Controller { public function edit():Response{return Inertia::render('Admin/Settings',['settings'=>Setting::pluck('value','key')]);} public function update(Request $r):RedirectResponse {$data=$r->validate(['settings'=>'array','settings.*'=>'nullable|string|max:5000']);foreach($data['settings']??[] as $key=>$value)Setting::updateOrCreate(['key'=>$key],['value'=>$value]);return back()->with('success','সেটিংস সংরক্ষণ করা হয়েছে।');} }
