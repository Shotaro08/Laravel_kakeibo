<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ComponentTestController;
// use App\Http\Controllers\LifeCycleTestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;

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

Route::resource('user', MainController::class)->middleware('auth')->except(['show']);

Route::prefix('user')
->middleware('auth')->group(function(){
    Route::get('delete-post/index', [MainController::class, 'deletePostIndex'])->name('user.delete-post.index');
    Route::post('destroy/{post}', [MainController::class, 'deletePostDestroy'])->name('user.delete-post.destroy');
});


Route::get('/home', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');;


require __DIR__.'/auth.php';
