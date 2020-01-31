<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeur1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heur1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jour');
            $table->string('e1');
             $table->string('p1');
             $table->string('p2');

            $table->string('s1');

            $table->string('e2');
            $table->string('p3');
             $table->string('p4');
            $table->string('s2');
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
        Schema::dropIfExists('heur1');
    }
}
