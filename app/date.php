<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class date extends Model
{
    protected $table='date';
     protected $fillable = [
       'id', 'jour', 'e1', 's1','e2','s2',
    ];
}
