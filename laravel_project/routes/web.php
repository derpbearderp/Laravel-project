<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/createpost', function () {
    return view('createpost');
});


Route::get('/userindex', function () {
    return view('userindex');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class, 'index', ])->name('home');

Route::post('myth/{post}', [App\Http\Controllers\PostController::class, 'myth', ])->name('posts.myth');

Route::get('spoilers', [App\Http\Controllers\PostController::class, 'spoiler'])->name('spoilers');

Route::get('search', [App\Http\Controllers\PostController::class, 'search'])->name('search');

Route::get('adminpage', [App\Http\Controllers\UserController::class, 'index'])->name('adminpage');

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);




