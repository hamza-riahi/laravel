<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newController extends Controller
{
    public function index(){

$title=' is a title';
return asset('/js/components/emp')->with('title',$title);


    }
}
