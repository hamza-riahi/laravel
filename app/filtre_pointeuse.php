<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filtre_pointeuse extends Model
{
   protected $table='filtre_pointeuse';
     protected $fillable = [
        'EnNo', 'Name_GMNo', 'DateTime',
    ];
}
