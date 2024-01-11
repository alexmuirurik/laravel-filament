<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->integer('user_id');
            $table->integer('contributor');
            $table->text('content');
            $table->string('thumbnail')->nullable();
            $table->string('categories')->nullable();
            $table->string('tags')->nullable();
            $table->string('template')->nullable();
            $table->integer('template_id')->nullable();
            $table->text('meta')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
