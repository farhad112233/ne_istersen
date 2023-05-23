<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catId')->unsigned();
            $table->string('name')->charset('utf8');
            $table->string('imgpath')->charset('utf8');
            $table->integer('number');
            $table->text('title')->charset('utf8');
            $table->bigInteger('price');
            $table->timestamps();

//            $table->foreign('catId')->references('id')->on('cats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
