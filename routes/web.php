<?php

use Statamic\Facades\Statamic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

