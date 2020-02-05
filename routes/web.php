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

Auth::routes(); 
//, 'middleware' => ['role:gerente|superadministrator|administrator|copropietario']

Route::group(['prefix' => 'home'], function () {
    //Route::get('/home', 'HomeController@index')->name('home');
    Route::redirect('/', 'home/access', 301)->name('home');

    Route::get('/access', 'AccessController@index')->name('home.access');
});


/*** SISTEMA ***/
//
Route::group(['prefix' => 'sistema'], function() { 
      
    Route::redirect('/','sistema/index',301)->name('sistema'); 
    /*Control de Acceso: Por defecto despues de Login de Usuario*/
     
    Route::get('/index','SistemaController@index')->name('sistema.index');
    
    /*** Plataforma Dashboard ***/
    Route::get('/dashboard','SistemaController@mostrarDashboard')->name('sistema.dashboard');
});
 



 