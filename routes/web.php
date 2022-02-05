<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UsersController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('permissions',PermissionController::class);
Route::resource('users',UsersController::class);
Route::resource('roles',RoleController::class);


Route::get('/get-data/{id}', [RoleController::class, 'getData']);  //I used this route for loading ajax data.
Route::post('/save-permission', [RoleController::class, 'SavePermission'])->name('savePermission'); //used this custom route to save the permissions into role, but its not necessary.






