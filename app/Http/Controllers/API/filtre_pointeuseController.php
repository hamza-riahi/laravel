<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\filtre_pointeuse;
class filtre_pointeuseController extends Controller
{
    public function index()
    {

return filtre_pointeuse::orderBy('EnNo', 'DESC')->paginate(1000);
    }


public function store(Request $Request)
{

	
return filtre_pointeuse::create([

'EnNo'=>$Request['EnNo'],
'Name_GMNo'=>$Request['Name_GMNo'],
'DateTime'=>$Request['DateTime'],


]);
}
}
