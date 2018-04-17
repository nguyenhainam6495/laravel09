<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');// id tự động tăng
            $table->tinyInteger('status')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('user_name')->nullable();
            $table->string('user_mail')->nullable();
            $table->string('user_phone')->nullable();
            $table->decimal('amount',15,4)->default(0.0000);
            $table->string('payment')->nullable();
            $table->longText('payment_info')->nullable();
            $table->string('message')->nullable();
            $table->string('security')->nullable();
            $table->timestamps();// tự tạo ra 2 cột created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
