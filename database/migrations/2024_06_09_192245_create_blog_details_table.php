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
        Schema::create('blog_details', function (Blueprint $table) {
            $table->id();
            $table->string('blog_id');
            $table->string('category_id');
            $table->string('category_title');
            $table->longText('category_desc');
            $table->string('category_image');
            $table->longText('blog_title');
            $table->longText('blog_body');
            $table->string('blog_tags');
            $table->string('blog_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_details');
    }
};
