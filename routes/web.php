<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\LogicController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\UserController;
// use Cart;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category}', [HomeController::class, 'show'])->name('category.show');

Route::post('/createuser', [UserController::class, 'store']);
Route::get('/add_to_cart/{id}/{quantity}',[LogicController::class, 'addToCart'])->middleware('auth')->name('addToCart');


// Route::get('/home/store', [HomeController::class, 'store'])->name('home.store');
// Route::get('/home/activities', [])
Route::post('/SearchFoodStuff', [HomeController::class, "searchfoodstuff"]);
Route::auto('/home', HomeController::class);
Route::auto('/admin', AdminController::class);


Route::get('/logmeout',function(){
    if(!Cart::isEmpty()){
        Cart::session(auth()->user()->ID)->clear();
    }
    Auth::logout();
    return redirect('/');

})->name('logmeout');
