<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'cors','middleware'=>'oauth'], function(){

	Route::get('user/authenticated', 'UserController@authenticated');

	Route::resource('clientes', 'ClientesController', ['except' => ['create', 'edit']]);
	Route::resource('contatos', 'ContatosController', ['except' => ['create', 'edit']]);
	Route::resource('empresas', 'EmpresasController', ['except' => ['create', 'edit']]);

});


