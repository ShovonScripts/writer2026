<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('events', function (Blueprint $table) { $table->id(); $table->string('title_bn'); $table->string('title_en'); $table->text('description_bn')->nullable(); $table->text('description_en')->nullable(); $table->date('event_date'); $table->string('location')->nullable(); $table->timestamps(); }); } public function down(): void { Schema::dropIfExists('events'); } };
