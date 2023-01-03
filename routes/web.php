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

Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
    Route::get('',[\App\Http\Controllers\Admin\HomeController::class,'index']);
    Route::get('home/add',[\App\Http\Controllers\Admin\HomeController::class,'index']);
    Route::get('home/detail',[\App\Http\Controllers\Admin\DetailController::class,'index']);
    Route::get('home/user',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('user/active/{user}',[App\Http\Controllers\Admin\UserController::class,'active']);
    Route::get('home/user/{user}/edit',[App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::post('home/user/{id}/edit',[App\Http\Controllers\Admin\UserController::class,'editStore']);
    Route::get('home/userDetail',[App\Http\Controllers\Admin\UserDetailController::class,'index']);
    Route::get('home/userDetail/create',[\App\Http\Controllers\Admin\UserDetailController::class,'create']);
    Route::post('home/userDetail/create',[\App\Http\Controllers\Admin\UserDetailController::class,'store']);
    Route::post('home/userDetail/{id}',[App\Http\Controllers\Admin\UserDetailController::class,'delete']);
    Route::get('home/detail/{id}/edit',[App\Http\Controllers\Admin\DetailController::class,'edit']);
    Route::post('home/detail/edit',[\App\Http\Controllers\Admin\DetailController::class,'editStore']);
    Route::post('home/detail/{id}/delete',[\App\Http\Controllers\Admin\DetailController::class,'delete']);
    Route::resource('home/customer',\App\Http\Controllers\Admin\CustomerController::class);


    Route::prefix('login')->group(function(){
        Route::get('',[\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('',[\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class,'logout']);
});

Route::middleware('CheckLogin')->group(function () {
    Route::get('', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('home/add', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::post('home/add', [\App\Http\Controllers\HomeController::class, 'create']);
    Route::get('home/show/n{id}/edit', [\App\Http\Controllers\HomeController::class, 'edit']);
    Route::post('home/show/{id}/delete', [\App\Http\Controllers\HomeController::class, 'delete']);
    Route::get('template/show',[\App\Http\Controllers\HomeController::class, 'show']);
    Route::get('template/showHs',[\App\Http\Controllers\HomeController::class, 'showHs']);
    // Route::get();
    Route::post('home/edit', [\App\Http\Controllers\HomeController::class, 'editStore']);
    Route::resource('file', \App\Http\Controllers\FileController::class);
    Route::resource('file/{file_id}/path', \App\Http\Controllers\FilePathController::class);
    Route::resource('contractor', \App\Http\Controllers\ContractorController::class);
    Route::resource('project', \App\Http\Controllers\ProjectController::class);
    Route::resource('package', \App\Http\Controllers\PackageController::class);
    // Route::resource('user', \App\Http\Controllers\ListUserController::class);
    Route::get('user/edit/{id}',[\App\Http\Controllers\UserController::class,'edit']);
    Route::post('user/edit/{id}',[\App\Http\Controllers\UserController::class,'editStore']);





});

Route::middleware('CheckLogin')->prefix('template')->group(function () {
    Route::get('', [\App\Http\Controllers\TemplateController::class, 'index']);
    Route::post('', [\App\Http\Controllers\TemplateController::class, 'test']);
    Route::post('cancel/{id}', [\App\Http\Controllers\TemplateController::class, 'cancelTemp']);


    Route::get('1/{detail_id}', [\App\Http\Controllers\TemplateController::class, 'create1']);
    Route::post('1', [\App\Http\Controllers\TemplateController::class, 'store1']);
    Route::post('1/save',[\App\Http\Controllers\TemplateController::class, 'save1']);

    Route::get('2/{detail_id}', [\App\Http\Controllers\TemplateController::class, 'create2']);
    Route::post('2', [\App\Http\Controllers\TemplateController::class, 'store2']);
    Route::post('2/save',[\App\Http\Controllers\TemplateController::class, 'save2']);
    Route::post('2/ajax', [\App\Http\Controllers\TemplateController::class, 'ajax']);
    Route::post('2/ajax1', [\App\Http\Controllers\TemplateController::class, 'ajax1']);
    Route::post('2/ajaxUQ', [\App\Http\Controllers\TemplateController::class, 'ajaxUQ']);


    Route::get('3/{detail_id}', [\App\Http\Controllers\TemplateController::class, 'create3']);
    Route::post('3', [\App\Http\Controllers\TemplateController::class, 'store3']);
    Route::post('3/save',[\App\Http\Controllers\TemplateController::class, 'save3']);

    //Template 4
    Route::get('4/{detail_id}', [\App\Http\Controllers\TemplateController::class, 'create4']);
    Route::post('4', [\App\Http\Controllers\TemplateController::class, 'store4']);
    Route::post('4/save',[\App\Http\Controllers\TemplateController::class, 'save4']);

    Route::get('41/{detail_id}', [\App\Http\Controllers\TemplateController::class, 'create4_1']);
    Route::post('41', [\App\Http\Controllers\TemplateController::class, 'store4_1']);
    Route::post('41/save',[\App\Http\Controllers\TemplateController::class, 'save41']);
    // Route::post('41/ajaxMT41', [\App\Http\Controllers\TemplateController::class, 'ajaxMT41']);

    //Template 5
    Route::get('5/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create5']);
    Route::post('5',[\App\Http\Controllers\TemplateController::class, 'store5']);
    Route::post('5/save',[\App\Http\Controllers\TemplateController::class, 'save5']);

    Route::get('51/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create51']);
    Route::post('51',[\App\Http\Controllers\TemplateController::class, 'store51']);
    Route::post('51/save',[\App\Http\Controllers\TemplateController::class, 'save51']);


    //Template 6

    Route::get('6/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create6']);
    Route::post('6',[\App\Http\Controllers\TemplateController::class, 'store6']);
    Route::post('6/save',[\App\Http\Controllers\TemplateController::class, 'save6']);

    Route::get('61/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create61']);
    Route::post('61',[\App\Http\Controllers\TemplateController::class, 'store61']);
    Route::post('61/save',[\App\Http\Controllers\TemplateController::class, 'save61']);




    //Template 7
    Route::get('7/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create7']);
    Route::post('7',[\App\Http\Controllers\TemplateController::class, 'store7']);
    Route::post('7/save',[\App\Http\Controllers\TemplateController::class, 'save7']);

    Route::get('71/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create71']);
    Route::post('71',[\App\Http\Controllers\TemplateController::class, 'store71']);
    Route::post('71/save',[\App\Http\Controllers\TemplateController::class, 'save71']);



    //Template 8
    Route::get('8/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create8']);
    Route::post('8',[\App\Http\Controllers\TemplateController::class, 'store8']);
    Route::post('8/save',[\App\Http\Controllers\TemplateController::class, 'save8']);


    //Template 9
    Route::get('9/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create9']);
    Route::post('9',[\App\Http\Controllers\TemplateController::class, 'store9']);
    Route::post('9/save',[\App\Http\Controllers\TemplateController::class, 'save9']);

    Route::get('91/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create91']);
    Route::post('91',[\App\Http\Controllers\TemplateController::class, 'store91']);
    Route::post('91/save',[\App\Http\Controllers\TemplateController::class, 'save91']);

    //Template 10
    Route::get('10/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create10']);
    Route::post('10',[\App\Http\Controllers\TemplateController::class, 'store10']);
    Route::post('10/save',[\App\Http\Controllers\TemplateController::class, 'save10']);

    //Template 11
    Route::get('11/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create11']);
    Route::post('11',[\App\Http\Controllers\TemplateController::class, 'store11']);
    Route::post('11/save',[\App\Http\Controllers\TemplateController::class, 'save11']);

    //Template 12
    Route::get('12/{detail_id}',[\App\Http\Controllers\TemplateController::class, 'create12']);
    Route::post('12',[\App\Http\Controllers\TemplateController::class, 'store12']);
    Route::post('12/save',[\App\Http\Controllers\TemplateController::class, 'save12']);

});
