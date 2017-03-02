<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_references', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('initial_price');
            $table->string('ISBN');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('section')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('level')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('book_references');
    }
}
