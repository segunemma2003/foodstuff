<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admins.dashboard');
    }

    public function activities(){
        $selectedActivityListLimit = '';
        $selectedActivityStatus = '';
        $activities = Activity::paginate(15);

        return view('admins.activities', compact('selectedActivityListLimit', 'selectedActivityStatus', 'activities'));
    }
    public function addproduct(){
        return view('admins.add_product');
    }
    public function aboutapp(){
        $modelChangeLog = [''];
        return view('admins.aboutapp', compact('modelChangeLog'));
    }
    public function adduser(){
        return view('admins.adduser');
    }
    public function ad(){
        $adminListLimits = [''];
        $adminRolls = [''];
        return view('admins.admins', compact('adminListLimits', 'adminRolls'));
    }
    public function default(){
        return view('admins.default');
    }
    public function blog(){
        // $posts = Blogpost::paginate(20);
        $posts  = [''];
        return view('admins.blogger', compact('posts'));
    }
    public function changelog(){
        $modeList = [''];
        $list = [''];
        $changeLog = [''];
        return view('admins.change_log', compact('modeList', 'list', 'changeLog'));
    }
    public function invoice(){
        $yearList = [''];
        $billList = [''];
        $list = [''];
        $list2 = [''];
        $invoices = [''];
        return view('admins.invoice', compact('yearList', 'billList', 'list', 'list2', 'invoices'));
    }
    public function mailinglist(){
        $list = [''];
        $list2 = [''];
        $mailingList = [''];
        return view('admins.mailing_list', compact('list', 'list2', 'mailingList'));
    }
    public function manageinvoice(){
        $users = [''];
        return view('admins.manage_invoice', compact('users'));
    }
    public function restaurantdish(){
        $model = [''];
        return view('admins.restaurantdish', compact('model'));
    }
    public function restaurants(){
        $restaurants = '';
        return view('admins.restaurants', compact('restaurants'));
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
