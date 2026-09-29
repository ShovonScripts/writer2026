<?php
namespace Database\Seeders;
use App\Models\Page;
use Illuminate\Database\Seeder;
class PageSeeder extends Seeder { public function run(): void { Page::updateOrCreate(['slug'=>'about'],['title_bn'=>'লেখক সম্পর্কে','title_en'=>'About the author','content_bn'=>'<p>শব্দ, মানুষ আর জীবনের গল্প নিয়ে আমি লিখি।</p>','content_en'=>'<p>I write about words, people and the stories of life.</p>']); Page::updateOrCreate(['slug'=>'contact'],['title_bn'=>'যোগাযোগ','title_en'=>'Contact','content_bn'=>'<p>আপনার বার্তা পাঠান।</p>','content_en'=>'<p>Send me a message.</p>']); } }
