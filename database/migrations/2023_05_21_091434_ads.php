<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('kitchens')->nullable();
            $table->string('parkings')->nullable();
            $table->integer('living_rooms')->nullable();
            $table->string('warehouses')->nullable();
            $table->string('location')->nullable();
            $table->string('area')->nullable();
            $table->decimal('size')->nullable();
            $table->integer('offices')->nullable();
            $table->string('action')->nullable();
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->integer('seller_id')->nullable();

            $table->string('pic1')->nullable();
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->string('pic4')->nullable();
            $table->string('pic5')->nullable();
            $table->string('pic6')->nullable();
            $table->string('pic7')->nullable();
            $table->string('shares')->nullable();
            $table->integer('views')->nullable();
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