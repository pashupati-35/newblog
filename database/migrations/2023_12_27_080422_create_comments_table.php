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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('comment');
            $table->string('response')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('post_id')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
