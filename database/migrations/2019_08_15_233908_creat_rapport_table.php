<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRapportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rapport', function (Blueprint $table) {
            $table->increments('id');
                         $table->string('EnNo');
                        $table->string('Name_GMNo');
                        $table->string('DateTime');
                        $table->string('E1r');
                        $table->string('E1plus');
                        $table->string('S1r');
                        $table->string('S1plus');
                        $table->string('E2r');
                        $table->string('E2plus');
                        $table->string('S2r');
                        $table->string('S2plus');
                        $table->string('Tottravail');
                       
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
