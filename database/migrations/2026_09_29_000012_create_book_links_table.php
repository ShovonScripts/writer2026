<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('book_links', function (Blueprint $table) { $table->id(); $table->foreignId('book_id')->constrained()->cascadeOnDelete(); $table->string('platform_name'); $table->string('url'); $table->string('icon')->nullable(); $table->unsignedInteger('sort_order')->default(0); $table->timestamps(); }); } public function down(): void { Schema::dropIfExists('book_links'); } };
