<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pointage extends Model
{



	protected $table='emp';
     protected $fillable = [
        'name', 'email', 'portable','addresse',
    ];
}
