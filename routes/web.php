<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostuserController;
use App\Http\Controllers\UserController;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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




Route::middleware('auth')->controller(UserController::class)->name('users.')->group(function () {
    Route::get('users', 'index')->name('index');
    Route::get('users/create', 'create')->name('create');
    Route::post('users', 'store')->name('store');
    Route::delete('users/{user}', 'destroy')->name('destroy');
    Route::get('users/{user}', 'show')->name('show');
    Route::get('users/{user}/edit', 'edit')->name('edit');
    Route::put('users/{user}', 'update')->name('update');
});

/*
Route::resource('users', UserController::class);
*/




Auth::routes();




Route::get('LaravelHome', [HomeController::class, 'lindex'])->name('laravel.home');
Route::get('BackendHome', [HomeController::class, 'bindex'])->name('bakend.home');





Route::middleware('auth')->controller(PostController::class)->name('posts.')->group(function () {
    Route::get('posts', 'index')->name('index');
    Route::get('posts/create', 'create')->name('create');
    Route::post('posts', 'store')->name('store');
    Route::delete('posts/{post}', 'destroy')->name('destroy');
    Route::get('posts/{post}', 'show')->name('show');
    Route::get('posts/{post}/edit', 'edit')->name('edit');
    Route::put('posts/{post}', 'update')->name('update');
});

/*
Route::resource('posts', PostController::class);
*/





Route::post('comments', [CommentController::class, 'store'])->name('comments.store');






Route::middleware('auth')->controller(PostuserController::class)->name('likes.')->group(function () {
    Route::get('likes', 'index')->name('index');
    Route::post('likes', 'store')->name('store');
});




Route::middleware('auth')->controller(InformationController::class)->name('informations.')->group(function () {
    Route::get('informations', 'index')->name('index');
    Route::get('informations/create', 'create')->name('create');
    Route::post('informations', 'store')->name('store');
    Route::get('informations/male', 'male')->name('male');
    Route::get('informations/female', 'female')->name('female');
    Route::get('informations/bachelor', 'bachelor')->name('bachelor');
    Route::get('informations/master', 'master')->name('master');
    Route::get('informations/tehran', 'tehran')->name('tehran');
    Route::get('informations/mashhad', 'mashhad')->name('mashhad');
    Route::get('informations/esfahan', 'esfahan')->name('esfahan');
    Route::get('informations/sort', 'sort')->name('sort');
});
