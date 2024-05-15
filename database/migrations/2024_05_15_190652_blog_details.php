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
        //
        Schema::create('blog_details', function (Blueprint $table) {
            $table->id();
            $table->string('blog_id');
            $table->string('cartegory_id');
            $table->string('cartegory_title');
            $table->string('cartegory_desc');
            $table->string('cartegory_image');
            $table->string('blog_title');
            $table->string('blog_body');
            $table->string('blog_tags');
            $table->string('blog_image');
            $table->string('blog_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
