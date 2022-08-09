<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\UserController;



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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('admin/',[AdminController::class,'index'])->name('admin');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function() {

    Route::group(['prefix' => 'admin','as'=>'admin.'], function() {


        Route::get('/login',[AdminController::class,'login'])->name('login.form');
        Route::post('/login/check',[AdminController::class,'handleLogin'])->name('login');

        Route::group(['middleware'=>'admin'],function(){
            Route::get('/',[AdminController::class,'index'])->name('index');
            Route::get('/logout',[AdminController::class,'logout'])->name('logout');
            
            Route::resource('categories', CategoryController::class);

            
        });



    });

});

Route::group(['namespace' => 'Backend'], function() {
    Route::group(['prefix' => 'user','as'=>'user.'], function() {
        Route::get('/profile',[UserController::class,'profile'])->name('profile');
        Route::get('/post',[UserController::class,'postAll'])->name('post.all');
        Route::get('/post/create',[UserController::class,'postForm'])->name('post.form');
        Route::post('/post/create',[UserController::class,'storePost'])->name('post.create');
        Route::get('/post/edit/{id}',[UserController::class,'editPost'])->name('post.edit');
        Route::post('/post/update/{id}',[UserController::class,'updatePost'])->name('post.update');
        Route::get('/post/delete/{id}',[UserController::class,'deletePost'])->name('post.delete');
        Route::post('/profile/update',[UserController::class,'profileUpdate'])->name('profile.update');
        Route::post('/search',[UserController::class,'searchPost'])->name('search.post');









    });

});



