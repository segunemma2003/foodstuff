<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminactivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminnotificationController;
use App\Http\Controllers\AffiliateearningController;
use App\Http\Controllers\AppdefaultController;
use App\Http\Controllers\BillingcardController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\ClientqueryController;
use App\Http\Controllers\FoodstuffcategroieController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FoodstuffController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailinglistController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantdishController;
use App\Http\Controllers\RestaurantdistributorController;
use App\Http\Controllers\RestaurantmenuController;
use App\Http\Controllers\RevenueindexController;
use App\Http\Controllers\SearchkeywordController;
use App\Http\Controllers\ShoppinglistController;
use App\Http\Controllers\TrackinglogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeeklydatumController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[AuthController::class,'register']);
Route::post('google/register',[AuthController::class,'google_auth_reg']);
Route::post('login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::apiResource('activities', ActivityController::class);
Route::apiResource('addresses', AddressController::class);
Route::post('address/get/ad', [AddressController::class, 'get_all_addresses']);
Route::apiResource('admins', AdminController::class);
Route::apiResource('adminactivities', AdminactivityController::class);
Route::apiResource('adminnotifications', AdminnotificationController::class);
Route::apiResource('affiliateearnings', AffiliateearningController::class);
Route::post('affiliateearnings/user', [AffiliateearningController::class, 'user_earnings']);
Route::apiResource('appdefaults', AppdefaultController::class);
Route::apiResource('billingcards', BillingcardController::class);
Route::post('billingcards/cards', [BillingcardController::class, 'cards']);
Route::apiResource('blogposts', BlogpostController::class);
Route::apiResource('carts', CartController::class);
Route::post('carts/fetch/cart', [CartController::class, 'fetch_cart']);
Route::apiResource('changelogs', ChangelogController::class);
Route::apiResource('clientqueries', ClientqueryController::class);
Route::apiResource('faqs', FaqController::class);
Route::apiResource('foodstuffs', FoodstuffController::class);
Route::post('foodstuffs/active', [FoodstuffController::class, 'active_index']);
Route::post('foodstuff/liked', [FoodstuffController::class, 'liked']);
Route::apiResource('invoices', InvoiceController::class);
Route::apiResource('likes', LikeController::class);
Route::apiResource('mailinglists', MailingListController::class);
Route::apiResource('restaurants', RestaurantController::class);
Route::apiResource('restaurantdishes', RestaurantdishController::class);
Route::apiResource('restaurantdistributors', RestaurantdistributorController::class);
Route::apiResource('restaurantmenus', RestaurantmenuController::class);
Route::apiResource('revenueindices', RevenueindexController::class);
Route::apiResource('searchkeywords', SearchkeywordController::class);
Route::apiResource('shoppinglists', ShoppinglistController::class);
Route::post('shoppinglists/shopping/list', [ShoppinglistController::class,'shopping_list']);
Route::post('shoppinglists/shopping/bulk/add', [ShoppinglistController::class,'store_in_bulk']);
Route::apiResource('trackinglogs', TrackinglogController::class);
Route::apiResource('users', UserController::class);
Route::post('users/profile', [UserController::class, 'user_profile']);
Route::post('users/verify/status', [UserController::class, 'check_user_verification']);
Route::apiResource('weeklydata', WeeklydatumController::class);
Route::apiResource('orders', OrderController::class);
