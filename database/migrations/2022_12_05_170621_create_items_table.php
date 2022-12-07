<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('name');
            $table->integer('price');
            $table->string('discount');
            $table->text('description');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('item_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');
            $table->integer('qty');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('restrict');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('restrict');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_size_id');
            $table->text('photo');
            $table->integer('status');
            $table->foreign('item_size_id')->references('id')->on('item_sizes')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
