<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCalculTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('calcul', function (Blueprint $table) {


             $table->increments('id');

            $table->string('EnNo');
            $table->string('Name_GMNo');

            $table->string('calcultravail');

            $table->string('jour');
          

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
    }
}
