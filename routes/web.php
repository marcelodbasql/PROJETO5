<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cadastrar', 'DemandaController@store');
Route::get('/relatorio', 'DemandaController@relatorio');
Route::get('/excluir/{id}', 'DemandaController@DeleteDemanda'); 
Route::get('/demanda/{id}', 'DemandaController@GetDemanda');