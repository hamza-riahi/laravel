<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class objet extends Model
{
  protected $table='objet';
     protected $fillable = [
       'id', 'jour', 'nbrHeureus','EnNo', 'Name_GMNo',
    ];
}
