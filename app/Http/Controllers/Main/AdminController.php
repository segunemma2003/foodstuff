<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admins.dashboard');
    }

    public function activities(){
        return view('admins.activities');
    }
    public function addproduct(){
        return view('admins.add_product');
    }
    public function aboutapp(){
        return view('admins.aboutapp');
    }
    public function adduser(){
        return view('admins.adduser');
    }
    public function ad(){
        return view('admins.admins');
    }
    public function default(){
        return view('admins.default');
    }
    public function blog(){
        return view('admins.blogger');
    }
    public function changelog(){
        return view('admins.change_log');
    }
    public function invoice(){
        return view('admins.invoice');
    }
    public function mailinglist(){
        return view('admins.mailing_list');
    }
    public function manageinvoice(){
        return view('admins.manage_invoice');
    }
    public function restaurantdish(){
        return view('admins.restaurantdish');
    }
    public function restaurants(){
        return view('admins.restaurants');
    }
    public function notifications(){
        return view('admins.notifications');
    }
    public function products(){
        return view('admins.products');
    }
    public function signin(){
        return view('admins.signin');
    }
    public function updateform(){
        return view('admins.update_form');
    }
    public function profile(){
        return view('admins.user_profile');
    }
    public function users(){
        return view('admins.users');
    }
}
