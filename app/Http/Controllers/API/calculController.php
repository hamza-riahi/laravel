<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\calcul;

class calculController extends Controller
{
    public function index()
      
    {

return calcul::latest()->paginate(10);
    }

public function store(Request $Request)
{

	
return calcul::create([

'EnNo'=>$Request['EnNo'],
'Name_GMNo'=>$Request['Name_GMNo'],
'calcultravail'=>$Request['calcultravail'],
'jour'=>$Request['jour'],

]);
}
}
