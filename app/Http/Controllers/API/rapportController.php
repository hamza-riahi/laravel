<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\rapport;
class rapportController extends Controller
{



   public function index()
    {

return rapport::latest()->paginate(100);
    }
    public function store(Request $Request)
{

	
return rapport::create([

'EnNo'=>$Request['EnNo'],
'Name_GMNo'=>$Request['Name_GMNo'],
'E1r'=>$Request['E1r'],
'DateTime'=>$Request['DateTime'],

'E1plus'=>$Request['E1plus'],
'S1r'=>$Request['S1r'],
'S1plus'=>$Request['S1plus'],
'E2r'=>$Request['E2r'],

'E2plus'=>$Request['E2plus'],
'S2plus'=>$Request['S2plus'],
'Tottravail'=>$Request['Tottravail'],
'S2r'=>$Request['S2r'],


]);
}
}
