<?php

namespace App\Http\Controllers\Main;

use App\Models\Cart;
use App\Models\Activity;
use App\Models\BlogPost;
use App\Models\FoodStuff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(){
        $blogposts = BlogPost::all();
        return view('main.home', compact('blogposts'));
    }

    public function store(){
        $foodStuffs = FoodStuff::paginate(50);
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';

        // dd($foodstuffs);'
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
        $blogPosts = BlogPost::all();
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
        $cartItemCount = '';
        return view('main.checkout', compact('cart','cartItemCount'));
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
    public function shoppingpolicy(){
        return view('main.shoppingpolicy');
    }

    public function signin(){
        return view('main.signin');
    }
    public function signup(){
        return view('main.signup');
    }

    public function statistics(){
        return view('main.statistics');
    }

    public function storedistribution(){
        return view('main.store_distribution');
    }

    public function storereset(){
        return view('main.store_reset');
    }
    public function success(){
        return view('main.success');
    }

    public function terms(){
        return view('main.terms');
    }
    public function topup(){
        return view('main.topup');
    }

}
