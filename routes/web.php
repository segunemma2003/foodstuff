<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);
Route::post('/createuser', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
// Route::get('/home/store', [HomeController::class, 'store'])->name('home.store');
// Route::get('/home/activities', [])
Route::auto('/home', HomeController::class);
Route::auto('/admin', AdminController::class);
