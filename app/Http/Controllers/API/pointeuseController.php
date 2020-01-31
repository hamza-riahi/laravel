<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use App\pointeuse;

class pointeuseController extends Controller
{
     public function index()
    {

return pointeuse::orderBy('EnNo', 'DESC')->paginate(1000);
    }




     public function submit(Request $res){


$path= $res-> file->getRealPath();
$data =Excel::load($path)->get();
    foreach ($data as $value) {
    $arr[]=[
    	'EnNo'=>$value->enno,
				'Name_GMNo'=>$value->name_gmno,
				'DateTime'=>$value->datetime    			


];
    }
if (!empty($arr)){
 
DB::table('pointeuse')->insert($arr);
    //echo "data inserted ";


    }
}

}







