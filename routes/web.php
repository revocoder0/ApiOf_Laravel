<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});
 

Auth::routes();
// for setting Route
Route::get('/setting', [SettingController::class,'edit'])->name('editsetting');
Route::post('/storesetting', [SettingController::class, 'update'])->name('storesetting');


// For Settings Route//
Route::get('/setting', [SettingController::class, 'index'])->name('setting');


// End for settings Route//

//Tags
Route::get('/tags', [TagsController::class, 'index'])->name('tags');
Route::post('/tags', [TagsController::class, 'store'])->name('tag_post');
Route::get('/tag_delete/{id}', [TagsController::class, 'destroy'])->name('tag_delete');
Route::get('/tags_edit/{id}', [TagsController::class, 'edit'])->name('tags_edit');
Route::post('/tags_update/{id}', [TagsController::class, 'update'])->name('tags_update');
//end Tags
//Social
Route::resource('social', SocialController::class);
Route::get('/social_delete/{id}', [SocialController::class, 'destroy'])->name('social_delete');
//End Social

// Route::post('/upload', [TagsController::class, 'update'])->name('tag_delete');


//Posts Routes
Route::get('/post/create',[PostController::class,'create'])->name('postcreate');
Route::post('/post/create',[PostController::class,'store'])->name('poststore');
Route::get('/post',[PostController::class,'index'])->name('post');
Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('postedit');
Route::put('/post/update/{id}',[PostController::class,'update'])->name('postupdate');
Route::get('/post/delete/{id}',[PostController::class,'destroy'])->name('delete_post');
Route::get('/post/show/{id}',[PostController::class,'show'])->name('detials');
Route::delete('/selected-posts',[PostController::class,'deleteCheckedPosts'])->name('deleteall');





// Category Route
Route::resource('category', CategoryController::class);
Route::delete('/selected-category',[CategoryController::class,'deleteCheckCategory'])->name('category.deleteCheckCategory');
// End Category Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});






