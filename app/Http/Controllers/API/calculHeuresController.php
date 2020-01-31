<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\calculHeures;

class calculHeuresController extends Controller
{
    public function index()
      
    {

return calculHeures::latest()->paginate(100);
    }
}
