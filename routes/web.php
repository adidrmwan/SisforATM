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
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('single','SingleController');
Route::post('import/single', 'SingleController@singleImport')->name('single.import');
// Route::get('single', 'SingleController@chartIndex');

Route::resource('pooling','poolingController');
// Route::post('import', 'SingleController@poolingImport')->name('pooling.import');

Route::resource('center','centerController');
Route::post('import/center', 'centerController@centerImport')->name('center.import');

Route::resource('drive','driveController');
// Route::post('import', 'SingleController@driveImport')->name('drive.import');

