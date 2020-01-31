<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calcul extends Model
{
    protected $table='calcul';
     protected $fillable = [
       'id', 'EnNo', 'Name_GMNo', 'calcultravail','jour',
    ];
}
