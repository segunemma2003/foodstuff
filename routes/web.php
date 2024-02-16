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
Route::post('/createuser', [UserController::class, 'store']);
Route::get('/add_to_cart/{id}/{quantity}',[LogicController::class, 'addToCart'])->middleware('auth')->name('addToCart');
Route::get('/remove_to_cart/{id}',[LogicController::class, 'removeCart'])->middleware('auth')->name('removeCart');
Route::post('/submit_to_cart',[LogicController::class, 'pushToCart'])->middleware('auth')->name('submit.shopping.list');


// Route::get('/home/store', [HomeController::class, 'store'])->name('home.store');
// Route::get('/home/activities', [])
Route::post('/SearchFoodStuff', [HomeController::class, "searchfoodstuff"]);
Route::auto('/home', HomeController::class);
// Route::auto('/admin', AdminController::class);


Route::get('/logmeout',function(){
    if(!Cart::isEmpty()){
        Cart::session(auth()->user()->ID)->clear();
    }
    Auth::logout();
    return redirect('/');

})->name('logmeout');
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

// routes by Yemi
Route::get('/store/{category}', [HomeController::class, 'storeFilterByCategory'])->name('storeFilterByCategory');
Route::post('/save_delivery_address', [HomeController::class, 'saveDeliveryAddress'])->name('saveDeliveryAddress');
Route::get('/shopping_lists', [HomeController::class, 'showShoppingPage'])->name('getShoppingLists');
Route::post('/shopping_lists', [HomeController::class, 'manageShoppingList'])->middleware('auth')->name('saveShoppingLists');
Route::delete('/shopping-list/{id}', [HomeController::class, 'deleteShoppingListItem'])->name('shopping-list.delete');
Route::patch('/shopping-list/{id}', [HomeController::class, 'updateShoppingListItem'])->name('shopping-list.update');
Route::post('/send-contact-email', [HomeController::class, 'sendContactEmail'])->name('send.contact_email');

