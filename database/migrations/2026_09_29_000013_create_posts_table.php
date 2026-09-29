<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('posts', function (Blueprint $table) { $table->id(); $table->string('title_bn'); $table->string('title_en'); $table->string('slug')->unique(); $table->longText('content_bn'); $table->longText('content_en'); $table->string('excerpt_bn')->nullable(); $table->string('excerpt_en')->nullable(); $table->string('featured_image')->nullable(); $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete(); $table->timestamp('published_at')->nullable(); $table->enum('status', ['draft','published'])->default('draft'); $table->timestamps(); $table->index(['status','published_at']); }); } public function down(): void { Schema::dropIfExists('posts'); } };
