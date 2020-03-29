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

Route::get('/', 'SelectionController@home');
Route::get('/selections', 'SelectionController@search');
Route::options('/selections/{id}', function(){ return 'success'; });
Route::options('/selections', function(){ return 'success'; });
Route::resource('selections', 'SelectionController', [
    'only' => ['store', 'update', 'destroy']
]);

Route::options('/companies', function(){ return 'success'; });
Route::options('/companies/{id}', function(){ return 'success'; });
Route::resource('/companies', 'CompanyController', [
  'only' => ['store', 'update']
]);

