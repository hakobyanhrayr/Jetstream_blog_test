<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin:admin')->group(function (){
   Route::get('admin/login',[AdminController::class,'LoginFrom']);
   Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin/home', function () {
        return view('admin.home');
    })->name('dashboard');

    //    --Post--
    Route::resource('admin/post', PostController::class);
    //    ---Category--
    Route::resource('admin/category', CategoryController::class);
    //    ---Tag---
    Route::resource('admin/tag',TagController::class);
    //    ---Admin-User--routes--
    Route::resource('admin/user',UserController::class);
    //    ---Admin-User--Roles--routes--
    Route::resource('admin/role',RoleController::class);
    //    ---Admin-User--Permission--routes--
    Route::resource('admin/permission',PermissionController::class);
});
