<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjednavkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('objednavky', function (Blueprint $table) {
          $table->increments('id');
          $table->date('datum');
          $table->string('cislo');
          $table->string('predmet');
          $table->bigInteger('suma');
          $table->string('dodavatel');
          $table->integer('ico');
          $table->string('adresa');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objednavky');
    }
}
