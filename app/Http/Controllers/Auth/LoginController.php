<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
           'UserEmail/Phone' => ['required'],
            'Passphrase' => ['required'],
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $data=array(
            'UserEmail'=>$request->get('UserEmail/Phone'),
            'password'=>$request->get('Passphrase')
            );

        $userInfo = User::where('UserEmail', '=' , $request["UserEmail/Phone"])->orWhere("Phone", '=', $request["UserEmail/Phone"])->first();
     
        if(!$userInfo){
           
            return back()->withErrors(["UserEmail/Phone" => "Invalid login credentials"]);
        }else{
          
            if(Hash::check($request->Passphrase,$userInfo->Passphrase)){
                if(Auth::attempt($data)){
                    
                    return redirect('/');
                }
                else{
                    return back()->withErrors(["UserEmail/Phone" => "Invalid login credentials"]);
                
                }
            }else{

                return back()->withErrors(["UserEmail/Phone" => "Invalid login credentials"]);
            }
        }
    }
}
