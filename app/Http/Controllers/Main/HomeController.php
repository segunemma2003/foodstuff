<?php

namespace App\Http\Controllers\Main;

use App\Models\Cart;
use Cart as Cartt;
use App\Models\Activity;
use App\Models\Blogpost;
use App\Models\Appdefault;
use App\Models\Foodstuff as FoodStuff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(){
        $blogposts = Blogpost::all();
        return view('main.home', compact('blogposts'));
    }

    public function store(){
        $foodStuffs = FoodStuff::cursorPaginate(50);
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';


        return view('main.store', compact('foodStuffs', 'pageItemRangeDisplay', 'totalRelatedFoodStuffItems', 'foodStuffListItemsLength'));
    }

    public function storeFilterByCategory($category){
        $foodStuffs = FoodStuff::where('category', 'like', '%' . strtolower($category) . '%')->cursorPaginate(50);
        if ($foodStuffs->isEmpty()) {
            return redirect()->back();
        }
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';


        return view('main.store', compact('foodStuffs', 'pageItemRangeDisplay', 'totalRelatedFoodStuffItems', 'foodStuffListItemsLength'));
    }





    public function activities(){
        $activities = Activity::paginate(20);
        return view('main.activities', compact('activities'));
    }
    public function affiliate(){
        return view('main.affiliate');
    }

    public function blog(){
        $blogPosts = Blogpost::all();
        return view('main.blog', compact('blogPosts'));
    }
    public function buynow(){
        return view('main.buynow');
    }
    public function cart(){
        $cart = Cart::paginate(10);
        $cartItemCount = '';
        $shippingCost = '';
        $cartTotal = '';
        return view('main.cart', compact('cart', 'cartItemCount', 'shippingCost', 'cartTotal'));
    }
    public function checkout(){
        $cart = Cart::paginate(10);
        $appDefault = Appdefault::all();
        $cartItemCount = '';
        return view('main.checkout', compact('cart','cartItemCount', 'appDefault'));
    }
    public function contact(){
        return view('main.contact');
    }
    public function cookie(){
        return view('main.cookie');
    }
    public function edit_profile(){
        return view('main.edit_profile');
    }
    public function error404(){
        return view('main.error404');
    }
    public function eula(){
        return view('main.eula');
    }
    public function help_center(){
        $model = [''];
        return view('main.help_center', compact('model'));
    }
    public function last_purchase(){
        $model = [''];
        return view('main.last_purchase', compact('model'));
    }

    public function logistics(){
        $model = [''];
        return view('main.logistics', compact('model'));
    }
    public function likes(){
        $model = [''];
        return view('main.likes', compact('model'));
    }

    public function manageaddress(){
        return view('main.manage_address');
    }
    public function manageinvoice(){
        $ViewBag = [''];
        return view('main.manage_invoice', compact('ViewBag'));
    }

    public function managerestaurants(){
        return view('main.manage_restaurants');
    }
    public function searchfoodstuff(Request $request){

        $foodStuffs =  FoodStuff::latest()->filter($request(["category", "keyboard"]))->get()::paginate(50);
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';
        return view('main.store', compact('foodStuffs', 'pageItemRangeDisplay', 'totalRelatedFoodStuffItems', 'foodStuffListItemsLength'));
    }
    public function restaurant(){
        return view('main.open_restaurant');
    }
    public function ourapp(){
        return view('main.ourapp');
    }
    public function ourstory(){
        return view('main.ourstory');
    }
    public function privacy(){
        return view('main.privacy');
    }

    public function refund(){
        return view('main.refund');
    }
    public function requestinvoice(){
        $FoodStuffs = FoodStuff::paginate(15);
        $selectedRIProduct = '';
        return view('main.requestinvoice', compact('FoodStuffs', 'selectedRIProduct'));
    }
    public function shippingpolicy(){
        return view('main.shippingpolicy');
    }

    public function signin(){
        return view('auth.login');
    }
    public function signup(){
        return view('auth.register');
    }

    // create user




    public function statistics(){
        return view('main.statistics');
    }

    public function storedistribution(){
        $isWebView = '';
        return view('main.store_distribution', compact('isWebView'));
    }

    public function storereset(){
        return view('main.store_reset');
    }
    public function success(){
        return view('main.success');
    }

    public function terms(){
        $foodStuffStore = FoodStuff::paginate(15);
        return view('main.terms', compact('foodStuffStore'));
    }
    public function topup(){
        $Model = [''];
        return view('main.topup', compact('Model'));
    }

}
