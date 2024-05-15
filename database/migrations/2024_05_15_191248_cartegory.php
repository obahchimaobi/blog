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
        Schema::create('cartegories', function (Blueprint $table) {
            $table->id();
            $table->string('cartegory_id');
            $table->string('cartegory_title');
            $table->string('cartegory_desc');
            $table->string('cartegory_image');
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
