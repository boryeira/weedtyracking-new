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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'Growlogs\GrowlogController@index')->name('home');

Route::resource('/growlogs', 'Growlogs\GrowlogController'); //CRUDS growlog

Route::prefix('/growlogs/{growlog}/')->group( function (){
  Route::resource('days', 'Growlogs\GrowlogDayController'); //CRUDS growlog days
  Route::resource('growlogstages', 'Growlogs\GrowlogStageController'); //actualizar  estapas
});
