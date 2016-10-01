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
Route::group(['middleware' => 'cors'], function(){
	Route::get('blocked', function(){
		return ['status' => false ]; 
	});
}); 



Route::get('/login', function(){
	return view('login'); 
}); 

//Rotas para o sistema adminstrativo do sistema. 
Route::group(['prefix' => 'adm'], function(){
	Route::post('login' , 'AdminController@login'); 
	Route::post('logout', 'AdminController@logout'); 
}); 

//Proteger pela camada de segurnaça da session mais tarde: 
Route::group(['middleware' => 'adm_auth'], function(){
	Route::get('/', function(){
		return view('index'); 
	}); 

	Route::group(['prefix' => 'order'], function(){
	 	Route::post('getAllActiveOrder'    , 'OrdemController@getAllActiveOrder'); 
	 	Route::post('setCancelOrder'       , 'OrdemController@setCancelOrder');     
	 	Route::post('setInProgressOrder'   , 'OrdemController@setInProgressOrder'); 
	 	Route::post('getAllCanceledOrder'  , 'OrdemController@getAllCanceledOrder');
	 	Route::post('getAllInProgressOrder', 'OrdemController@getAllInProgressOrder'); 
		Route::post('getAllFinishedOrder'  , 'OrdemController@getAllFinishedOrder');  
	}); 	
}); 

//Rotas para API do aplicativo; 
//Rotas para usuário| sem segurança; 
Route::group(['middleware' => ['cors', 'api_auth'] ], function(){
	Route::group(['prefix' => 'u'], function(){
		Route::post('login'   , 'UsuarioController@login'); 
		Route::post('register', 'UsuarioController@register'); 
		Route::post('update'  , 'UsuarioController@update'); 
		Route::post('getUser' , 'UsuarioController@getUser'); 
	}); 
}); 

Route::group(['middleware' => ['cors', 'api_auth']], function(){	
	Route::group(['prefix' => 's'], function(){
		Route::post('getAll'           , 'ServicoController@getAll'); 
		Route::post('order'            , 'ServicoController@order'); 
		Route::post('getActiveOrder'   , 'ServicoController@getActiveOrder'); 
		Route::post('cancelActiveOrder', "ServicoController@cancelActiveOrder");
	}); 
}); 