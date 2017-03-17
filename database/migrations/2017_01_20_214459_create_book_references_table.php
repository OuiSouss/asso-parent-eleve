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
            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('section')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('level_id');
            $table->foreign('level_id')->references('id')->on('level')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('subject_id');
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
