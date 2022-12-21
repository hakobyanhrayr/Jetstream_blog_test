<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\ContentController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\WelcomeController;
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

//Route::get('/',[WelcomeController::class,'index']);
Route::get('/',[WelcomeController::class,'show']);
Route::get('/home', [HomeController::class,'index'])->name('home');
//Route::get('/',[WelcomeController::class,'posts']);


//Route::get('/', function () {
//    return view('home');
//});

Route::middleware('admin:admin')->group(function (){
   Route::get('admin/login',[AdminController::class,'LoginFrom']);
   Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,user', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.blog');
    })->name('dashboard');

    Route::resource('/posted',UserPostController::class);
    Route::get('/category',[ContentController::class,'category'])->name('category');
    Route::get('/tag',[ContentController::class,'tag'])->name('tag');
});
//Route::group(['prefix' => 'user'],function(){
//    Route::resource('/posted',UserPostController::class);
//    Route::get('/category',[ContentController::class,'category'])->name('category');
//    Route::get('/tag',[ContentController::class,'tag'])->name('tag');
//});

//-------
Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'admin'],function(){
        //    --Post--
        Route::resource('/post', PostController::class);
        //    ---Category--
        Route::resource('/category', CategoryController::class);
        //    ---Tag---
        Route::resource('/tag',TagController::class);
        //    ---Admin-User--routes--
        Route::resource('/user',UserController::class);
        //    ---Admin-User--Roles--routes--
        Route::resource('/role',RoleController::class);
        //    ---Admin-User--Permission--routes--
        Route::resource('/permission',PermissionController::class);
    });
});


