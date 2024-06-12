<?php

use Statamic\Facades\Statamic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WordPressController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/users', [UserController::class, 'store']);

Route::statamic('password', 'auth.password');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);

Route::get('/aboutus', function () {
    return view('aboutus');
});

Auth::routes();

Route::get('/homepage', function () {
    return view('homepage');
});
Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/wp-posts', [WordPressController::class, 'getPosts']);
Route::get('/wp-users', [WordPressController::class, 'getUsers']);

Route::get('/chatbot', function () {
    return view('chatbot');
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
