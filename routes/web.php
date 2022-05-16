<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();/**Arth routhes all  */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    //Posts Routes
    Route::resource('post', PostController::class);
    Route::delete('/selected-posts',[PostController::class,'deleteCheckedPosts'])->name('deleteall');
    Route::get('/tagpostall/{id}', [PostController::class, 'tagpostall'])->name('tagpostall');

    // Category Route
    Route::resource('category', CategoryController::class);
    Route::delete('/selected-category',[CategoryController::class,'deleteCheckCategory'])->name('category.deleteCheckCategory');
    Route::get('/categorys/{id}', [CategoryController::class,'category'])->name('categoryposts');
    //end Category Route
    //Social
    Route::resource('social', SocialController::class);
    Route::get('/social_delete/{id}', [SocialController::class, 'destroy'])->name('social_delete');
    //End Social
    // Setting Route
    Route::get('/setting', [SettingController::class,'edit'])->name('setting');
    Route::post('/setting', [SettingController::class, 'update'])->name('storesetting');
    //End Setting Route
    //Tags
    Route::resource('tags', TagsController::class);
    //end Tags
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});






