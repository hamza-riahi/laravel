<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\date;

class dateController extends Controller
{
     public function index()
      
    {

return date::latest()->paginate(10);
    }

}
