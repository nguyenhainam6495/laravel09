<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');// id tự động tăng
            $table->integer('catalog_id')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price',15,4)->default(0.0000);
            $table->longText('content')->nullable();
            $table->integer('discount')->nullable();
            $table->string('image_link')->nullable();
            $table->longText('image_list')->nullable();
            $table->timestamps();// tự động tạo cột created_at, updated_at
            $table->integer('view')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
