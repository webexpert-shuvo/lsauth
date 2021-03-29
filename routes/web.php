<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!  password_confirmation
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::group(['middleware' => 'sa' ] , function(){

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    });




    Route::get('/testemail',[App\Http\Controllers\TestemailController::class,'testEmail'])->name('testemail');

    //Home page route
    Route::group(['namespace' => 'App\Http\Controllers'] , function(){

        Route::get('/users', 'UsersController@index')->name('users.show');
        Route::post('/user-add','UsersController@create')->name('user.add');
        Route::get('/allusers','UsersController@allusers')->name('allusers');
        Route::get('/user-update/{id}','UsersController@uupdate')->name('uupdate');
        Route::get('/userup/{id}','UsersController@updateform')->name('usermodalup');
        Route::post('/uformup','UsersController@updatewithform')->name('uform');
        Route::get('/user-delete/{id}','UsersController@delete')->name('userdelete');

    });

    //Role Controller

    Route::group(['namespace'   => 'App\Http\Controllers'] , function(){

        Route::get('/roles', 'RoleController@index')->name('roles');
        Route::post('/roleadd', 'RoleController@store')->name('role.add');


    });

