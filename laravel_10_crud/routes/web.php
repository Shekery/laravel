<?php

use App\Http\Controllers\ColumnTypesController;
use App\Http\Controllers\DocumentTemplateColumnsController;
use App\Http\Controllers\DocumentTemplateFilesController;
use App\Http\Controllers\DocumentTemplatesController;
use App\Http\Controllers\DocumentTemplateUserRelationsController;
use App\Http\Controllers\DocumentTemplateUsersController;
use App\Http\Controllers\DocumentTypesController;
use App\Http\Controllers\OrganizationsController;
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

Route::resource('organizations', OrganizationsController::class);
Route::resource('documentTypes', DocumentTypesController::class);
Route::resource('columnTypes', ColumnTypesController::class);

Route::resource('documentTemplates', DocumentTemplatesController::class);
Route::get('documentTemplates/create_with_id/{document_type_id}', '\App\Http\Controllers\DocumentTemplatesController@create_with_id')->name('documentTemplates.create_with_id');

Route::resource('documentTemplateColumns', DocumentTemplateColumnsController::class);
Route::get('documentTemplateColumns/create_with_id/{document_template_id}', '\App\Http\Controllers\DocumentTemplateColumnsController@create_with_id')->name('documentTemplateColumns.create_with_id');

Route::resource('documentTemplateFiles', DocumentTemplateFilesController::class);
Route::get('documentTemplateFiles/create_with_id/{document_template_id}', '\App\Http\Controllers\DocumentTemplateFilesController@create_with_id')->name('documentTemplateFiles.create_with_id');

Route::resource('documentTemplateUsers', DocumentTemplateUsersController::class);
Route::get('documentTemplateUsers/create_with_id/{document_template_id}', '\App\Http\Controllers\DocumentTemplateUsersController@create_with_id')->name('documentTemplateUsers.create_with_id');

Route::resource('documentTemplateUserRelations', DocumentTemplateUserRelationsController::class);
Route::get('documentTemplateUserRelations/create_with_id/{document_templates_user_id}', '\App\Http\Controllers\DocumentTemplateUserRelationsController@create_with_id')->name('documentTemplateUserRelations.create_with_id');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('welcome');
});
