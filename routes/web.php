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




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::post('/createuser', [UserController::class, 'store']);
Route::get('/add_to_cart/{id}/{quantity}',[UserController::class, 'addToCart'])->middleware('auth')->name('addToCart');
Route::post('/login', [UserController::class, 'login']);
// Route::get('/home/store', [HomeController::class, 'store'])->name('home.store');
// Route::get('/home/activities', [])
Route::post('/SearchFoodStuff', [HomeController::class, "searchfoodstuff"]);
Route::auto('/home', HomeController::class);
Route::auto('/admin', AdminController::class);
