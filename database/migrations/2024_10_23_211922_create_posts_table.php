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
            $table->string('title',100);
            $table->text('text');
          //  $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
        Schema::create('post_category', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('post_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_category');
    }
};
