<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\objet;

class objetController extends Controller
{
  public function index()
    {
return objet::orderBy('EnNo', 'DESC')->paginate(1000000);

    }

public function update(Request $Request,$id)
{

$hm = objet::findOrFail($id);

  $this->validate($Request,[
      'nbrHeureus' =>'required|Int',
   


  ]);

$hm->update($Request->all());

//return ['message'=>'update'];
}


    public function store(Request $Request)
{

	$this->validate($Request,[
      'EnNo' =>'required',
      'Name_GMNo' =>'required',
      'nbrHeureus' =>'required',
      'jour' =>'required',



	]);
return objet::create([
'EnNo'=>$Request['EnNo'],
'Name_GMNo'=>$Request['Name_GMNo'],
'nbrHeureus'=>$Request['nbrHeureus'],
'jour'=>$Request['jour'],

]);
}
}
