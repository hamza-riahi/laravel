<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calculHeures extends Model
{
   protected $table='calcul_heures';
     protected $fillable = [
       'id', 'date', 'R1', 'plus1','R2','plus2','totTravail'
    ];
}
