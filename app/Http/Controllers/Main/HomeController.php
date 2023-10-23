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
    public function likes(){
        $model = [''];
        return view('main.likes', compact('model'));
    }

    public function mailing(){
        return view('main.mailing_list');
    }

    public function order(){
        return view('main.order');
    }
    public function restaurant(){
        return view('main.restaurant');
    }
    public function restaurantdish(){
        return view('main.restaurantdish');
    }
    public function restaurantdistribution(){
        return view('main.restaurantdistribution');
    }
    public function restaurantmenu(){
        return view('main.restaurantmenu');
    }

    public function revenueindex(){
        return view('main.revenueindex');
    }
    public function searchkey(){
        return view('main.searchkey');
    }
    public function shoppinglist(){
        return view('main.shoppinglist');
    }

    public function trackinglog(){
        return view('main.trackinglog');
    }
    public function user(){
        return view('main.user');
    }

    public function weekly(){
        return view('main.weekly');
    }

}
