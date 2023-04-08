<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('DocumentTypes', \App\Http\Controllers\DocumentTypesController::class);
Route::get('/DocumentTypes/{documentType}', 'DocumentTypesController@show')->name('documentTypes.show');
Route::get('/DocumentTypes/{documentType}/edit', 'DocumentTypesController@edit')->name('documentTypes.edit');
Route::get('/', function () {
    return view('welcome');
});
