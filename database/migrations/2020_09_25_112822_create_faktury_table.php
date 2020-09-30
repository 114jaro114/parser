<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faktury', function (Blueprint $table) {
          $table->increments('id');
          $table->string('datum')->nullable();
          $table->string('cislo')->nullable();
          $table->string('predmet')->nullable();
          $table->string('suma')->nullable();
          $table->string('dodavatel')->nullable();
          $table->string('ico')->nullable();
          $table->string('adresa')->nullable();
          $table->string('typ')->default("Faktúra");
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktury');
    }
}
