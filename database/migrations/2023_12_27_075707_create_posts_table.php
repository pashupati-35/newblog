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
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('feature_image')->nullable();
            $table->text('short_description');
            $table->longText('description')->nullable();
            $table->integer('view_count')->default(0);
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('created_by')->on('users')->references('id');
            $table->foreign('updated_by')->on('users')->references('id');
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('post_id')->on('posts')->references('id');
            $table->foreign('tag_id')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('posts');
    }
};
