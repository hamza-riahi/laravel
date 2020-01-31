<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rapport extends Model
{
    protected $table='rapport';
     protected $fillable = [
        'id','EnNo', 'Name_GMNo', 'DateTime','E1r','E1plus','S1r','S1plus','E2r','E2plus','S2r','S2plus','Tottravail'




    ];}
