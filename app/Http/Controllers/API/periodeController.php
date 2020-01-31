<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\periode;
class periodeController extends Controller
{
   public function index()
    {

return periode::latest()->paginate(100);
    }
     public function update(Request $Request,$id)
{

$pr = periode::findOrFail($id);


	$this->validate($Request,[
      'dateDeb' =>'required|Int|min:1|max:30',
      'DateFin' =>'required|Int|min:1|max:31',
  



	]);

$pr->update($Request->all());

//return ['message'=>'update'];
}
}
