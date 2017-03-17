<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->text('city');
            $table->text('postal_code');
            $table->string('phone');
            $table->date('begin_adhesion');
            $table->date('end_adhesion');
            $table->unsignedInteger('contribution_id');
            $table->foreign('contribution_id')->references('id')->on('contributions')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            //$table->boolean('active_account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adherents');
    }
}
