<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', [App\Http\Controllers\HomeController::class, 'getLogin']);
Route::post('login', [App\Http\Controllers\HomeController::class, 'postLogin']);
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout']);



Route::middleware('CheckLogin')->group(function () {
    Route::get('', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::resource('file', \App\Http\Controllers\FileController::class);
    Route::resource('file/{file_id}/path', \App\Http\Controllers\FilePathController::class);
    Route::resource('contractor', \App\Http\Controllers\ContractorController::class);
    Route::resource('project', \App\Http\Controllers\ProjectController::class);
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('package', \App\Http\Controllers\PackageController::class);
    Route::resource('user', \App\Http\Controllers\ListUserController::class);


});

Route::middleware('CheckLogin')->prefix('template')->group(function () {
    Route::get('', [\App\Http\Controllers\TemplateController::class, 'index']);

    Route::get('1', [\App\Http\Controllers\TemplateController::class, 'create1']);
    Route::post('1', [\App\Http\Controllers\TemplateController::class, 'store1']);

    Route::get('2', [\App\Http\Controllers\TemplateController::class, 'create2']);
    Route::post('2', [\App\Http\Controllers\TemplateController::class, 'store2']);
    Route::post('2/ajax', [\App\Http\Controllers\TemplateController::class, 'ajax']);
    Route::post('2/ajax1', [\App\Http\Controllers\TemplateController::class, 'ajax1']);
    Route::post('2/ajaxUQ', [\App\Http\Controllers\TemplateController::class, 'ajaxUQ']);


    Route::get('3', [\App\Http\Controllers\TemplateController::class, 'create3']);
    Route::post('3', [\App\Http\Controllers\TemplateController::class, 'store3']);

    Route::get('4', [\App\Http\Controllers\TemplateController::class, 'create4']);
    Route::post('4', [\App\Http\Controllers\TemplateController::class, 'store4']);
    Route::post('4/ajaxMT', [\App\Http\Controllers\TemplateController::class, 'ajaxMT']);

    Route::get('4_1', [\App\Http\Controllers\TemplateController::class, 'create4_1']);
    Route::post('4_1', [\App\Http\Controllers\TemplateController::class, 'store4_1']);
    Route::post('4_1/ajaxMT41', [\App\Http\Controllers\TemplateController::class, 'ajaxMT41']);

    Route::get('5',[\App\Http\Controllers\TemplateController::class, 'create5']);

});
