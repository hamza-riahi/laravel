<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCalculHeuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calcul_heures', function (Blueprint $table) {
            $table->increments('id');
                        $table->string('date');
                        $table->string('R1');
                        $table->string('plus1');
                        $table->string('R2');
                        $table->string('plus2');
                        $table->string('totTravail');
                        
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
