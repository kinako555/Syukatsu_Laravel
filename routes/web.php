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
Route::delete('/selections/{id}', 'SelectionController@destroy');
Route::post('/selection', 'SelectionController@create');
Route::patch('/selections/{id}', 'SelectionController@update');
Route::options('/selections/{id}', function(){ return 'success'; });
Route::options('/selection', function(){ return 'success'; });
/*
Route::resource('selections', 'SelectionController', [
    'only' => ['create', 'update', 'destroy']
  ]);
*/
/*
Route::resource('/companies', 'CompanyController', [
  'only' => 'create'
]);
*/
Route::post('/company', 'CompanyController@create');
Route::patch('/companies/{id}', 'CompanyController@update');
Route::options('/company', function(){ return 'success'; });
Route::options('/companies/{id}', function(){ return 'success'; });
