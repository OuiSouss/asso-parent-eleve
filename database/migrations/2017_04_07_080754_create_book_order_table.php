<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('state', [1, 2, 3, 4, 5]);
            $table->unsignedInteger('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_order');
    }
}
