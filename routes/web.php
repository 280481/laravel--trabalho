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

Route::middleware(['tads'])->group(function(){
  
    Route::get('/tads',function(){
        return view('tads');
    })->name('tads.get');
    
    Route::post('/tads',function(){
        return view('tads',['msg'=>'test post']);
    });
    
    Route::put('/tads',function(){
        return view('tads',['msg'=>'test put']);
    });
    
    Route::delete('/tads',function(){
        return view('tads',['msg'=>'test delete']);
    });

    Route::resource('estados','EstadoController')->except(['show']);
    Route::resource('tarefas','TarefaController')->except(['show']);
    Route::resource('cidades','CidadeController')->except(['show']);
    
    Route::get('/estados/{estado}confirm','EstadoController@confirm')->name('estados.confirm');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
