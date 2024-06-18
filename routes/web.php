<?php

use Statamic\Facades\Statamic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WordPressController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DashboardController;
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

Route::get('/test', function () {
    return view('test');
});
Route::get('/test-share', function () {
    return view('test-share');
});
// Route::get('/page/{slug}', [PageController::class, 'show']);
Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/', [PageController::class, 'index'])->name('home');
// Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
//     Route::post('/like/{entry}', [LikeController::class, 'like'])->name('like');
//  Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');




Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    // Route::post('/like/{slug}', [PageController::class, 'like'])->name('page.like');
    Route::post('/pages/{slug}/like', [PageController::class, 'like'])->name('like')->middleware('auth');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/users', [UserController::class, 'main'])->name('users.main');
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/data', [DashboardController::class, 'getData'])->name('data');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('users', UserController::class);
