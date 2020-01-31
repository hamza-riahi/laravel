<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pointeuse extends Model
{
    
	protected $table='pointeuse';
     protected $fillable = [
        'EnNo', 'Name_GMNo', 'DateTime',
    ];}
