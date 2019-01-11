<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Currency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('sign');
            $table->tinyInteger('Type');
            $table->string('Exchange');
            $table->string('State');
            $table->integer('DataEntry');
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
        //
        Schema::dropIfExists('Currencies');
    }
}
