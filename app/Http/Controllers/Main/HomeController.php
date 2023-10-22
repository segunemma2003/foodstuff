<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\FoodStuff;
use App\Models\Activity;


class HomeController extends Controller
{
    public function index(){
        $blogposts = BlogPost::all();
        return view('main.home', compact('blogposts'));
    }

    public function store(){
        $foodstuffs = FoodStuff::paginate(50);
        dd($foodstuffs);
        return view('main.store', compact('foodstuffs'));
    }

    public function activities(){
        $activities = Activity::paginate(20);
        return view('main.activities', compact('activities'));
    }
    public function affiliate(){
        return view('main.affiliate');
    }

    public function blog(){
        return view('main.blog');
    }
    public function buynow(){
        return view('main.buynow');
    }
    public function cart(){
        return view('main.cart');
    }
    public function checkout(){
        return view('main.checkout');
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
        return view('main.help_center');
    }
    public function last_purchase(){
        return view('main.last_purchase');
    }
    public function likes(){
        return view('main.likes');
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
