<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pointage;
class pointController extends Controller
{
     public function index()
    {

return pointage::latest()->paginate(10);
    }


public function store(Request $Request)
{

	$this->validate($Request,[
      'name' =>'required|string|max:255',
      'email' =>'required|string|email|max:255|unique:users',
      'portable' =>'required|string|min:8',
      'addresse' =>'required|string|max:255',



	]);
return pointage::create([
'name'=>$Request['name'],
'email'=>$Request['email'],
'portable'=>$Request['portable'],
'addresse'=>$Request['addresse'],

]);
}
 public function show($id)
{

}

  public function update(Request $Request,$id)
{
$piont = pointage::findOrFail($id);


	$this->validate($Request,[
      'name' =>'required|string|max:255',
      'email' =>'required|string|email|max:255|unique:users,email,'.$piont->id,
      'portable' =>'required|string|min:8',
      'addresse' =>'required|string|max:255',



	]);

$piont->update($Request->all());

//return ['message'=>'update'];
}

 public function destroy($id)
 {


$piont = pointage::findOrFail($id);



$piont->delete();






 }}
