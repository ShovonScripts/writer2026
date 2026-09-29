<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('books', function (Blueprint $table) { $table->id(); $table->string('title_bn'); $table->string('title_en'); $table->string('slug')->unique(); $table->text('description_bn'); $table->text('description_en'); $table->string('cover_image')->nullable(); $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete(); $table->unsignedSmallInteger('published_year')->nullable(); $table->boolean('is_featured')->default(false); $table->enum('status', ['draft','published'])->default('draft'); $table->timestamps(); $table->index(['status','is_featured']); }); } public function down(): void { Schema::dropIfExists('books'); } };
