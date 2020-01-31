<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class heur extends Model
{
    protected $table='heur';
     protected $fillable = [
       'id', 'jour', 'e1', 's1','e2','s2',
    ];
}
