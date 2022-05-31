<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ComponentTestController;
// use App\Http\Controllers\LifeCycleTestController;
// use App\Http\Controllers\UserController;
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

// Route::get('/user/index', [MainController::class, 'index'])->middleware('auth')->name('user.index');
// Route::get('/user/create', [MainController::class, 'create'])->middleware('auth')->name('user.create');
// Route::post('/user/store', [MainController::class, 'store'])->middleware('auth')->name('user.store');
// Route::get('/user/edit', [MainController::class, 'edit'])->middleware('auth')->name('user.edit');
// Route::get('/user/update', [MainController::class, 'update'])->middleware('auth')->name('user.update');

Route::resource('user', MainController::class)->middleware('auth');

Route::prefix('user')
->middleware('auth')->group(function(){
    Route::get('delete-post/index', [MainController::class, 'deletePostIndex'])->name('user.delete-post.index');
    Route::post('destroy/{post}', [MainController::class, 'deletePostDestroy'])->name('user.delete-post.destroy');
});

Route::get('/home', function () {
    return view('user.dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';
