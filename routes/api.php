<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route:: apiresources(['pointeuse'=>'API\pointeuseController']);
Route:: apiresources(['point'=>'API\pointController']);
Route:: apiresources(['heur'=>'API\heurController']);
Route:: apiresources(['calcul'=>'API\calculController']);
Route:: apiresources(['filtre_pointeuse'=>'API\filtre_pointeuseController']);
Route:: apiresources(['calculHeures'=>'API\calculHeuresController']);
Route:: apiresources(['rapport'=>'API\rapportController']);
Route:: apiresources(['periode'=>'API\periodeController']);
Route:: apiresources(['heur1'=>'API\heur1Controller']);
Route:: apiresources(['objet'=>'API\objetController']);
