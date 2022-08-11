<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\JobManageController;
use App\Http\Controllers\Admin\UserManageController;



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

            Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
            Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
            Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
            Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
            Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
            Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
            ///User Manage Routes
            Route::get('/user/create',[UserManageController::class,'createuser'])->name('user.create');
            Route::post('/user/store',[UserManageController::class,'storeuser'])->name('user.store');
            Route::post('/user/update/{id}',[UserManageController::class,'updateuser'])->name('user.update');
            Route::get('/user/delete/{id}',[UserManageController::class,'deleteuser'])->name('user.delete');
            Route::get('/status-active/{id}',[UserManageController::class,'statusactive'])->name('user.statusactive');
            Route::get('/status-deactive/{id}',[UserManageController::class,'statusdeactive'])->name('user.statusdeactive');





            Route::get('/all-users',[UserManageController::class,'allUsers'])->name('user.allUsers');
            Route::post('/active-users',[UserManageController::class,'activeUsers'])->name('user.activeUsers');
            Route::get('/deactive-users',[UserManageController::class,'deactiveUsers'])->name('user.deactiveUsers');


            //Job manage route
            Route::get('/all-job',[JobManageController::class,'allJobs'])->name('job.allJobs');
            Route::get('/active-job',[JobManageController::class,'activeJobs'])->name('job.activeJobs');
            Route::get('/deactive-job',[JobManageController::class,'deactiveJobs'])->name('job.deactiveJobs');

            Route::get('/apply-job',[JobManageController::class,'applyJobs'])->name('job.apply');

            Route::get('/apply-job',[JobManageController::class,'applyJobs'])->name('job.apply');








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
        Route::get('/single/post/{id}',[UserController::class,'singlePost'])->name('single.post');
        Route::get('/apply/{id}',[UserController::class,'apply'])->name('apply');
        Route::get('/apply',[UserController::class,'showApply'])->name('apply.all');
        Route::get('/all-jop-post',[UserController::class,'allJob'])->name('job.all');
        Route::get('/category/{id}',[UserController::class,'categoryJob'])->name('cetegory.job');











    });

});



