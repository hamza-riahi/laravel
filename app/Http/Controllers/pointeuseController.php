<?php

namespace App\Http\Controllers;
use Excel;
use DB;
use Illuminate\Http\Request;

class pointeuseController extends Controller
{
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
$t1 = strtotime( '2006-04-14 11:30:00' );
$t2 = strtotime( '2006-04-12 12:30:00' );
$diff = $t1 - $t2;
$hours = $diff / ( 60 * 60 );

//echo $hours;
    echo "les donnes sont insérées avec succès ";


    }
}




}
