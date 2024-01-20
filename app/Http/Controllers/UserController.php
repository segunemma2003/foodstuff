<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        
        $users = User::get();

        return response(['data' => $users ], 200);
    }

    public function user_profile(Request $request){
        $uuid = $request->uuid;
        $result = null;
        if(is_null($uuid)){
            $result = User::get();
        }else{
        $result = User::where('uuid', $uuid)->get();
    }
        return response(['data' => $result ], 200);
    }

    public function check_user_verification(Request $request){
        $uuid = $request->uuid;
        $result = null;
        if(is_null($uuid)){
            $result = User::get(['phoneverified', 'emailverified', 'uuid']);
        }else{
        $result = User::where('uuid', $uuid)->get(['phoneverified', 'emailverified', 'uuid']);
    }
        return response(['data' => $result ], 200);

    }

    public function store(Request $request)
    {

        try{
        
              $userData= $request->validate([
                'UserEmail'=>["required","string","max:30","email", Rule::unique("users", "UserEmail")],
                'Username'=>["required","string","max:30"],
                'Phone'=>["required"],
                "Passphrase"=>["required","min:5","confirmed"],
                "Passphrase_confirmation"=>["required"],
            ]);
           
              if($userData){
                $user = DB::table('users')->where('UserEmail', $userData["UserEmail"])->first();
                
               if($user){
               return  redirect("/home/signup")->withErrors(["email"=>"Invalid login credentials"]);
               }else{
                $user = new User();
                $createdUser  = $user->saveUser($userData);
              
                return  redirect("/");
               }
            
              }
      
        }catch(Exception $e){
           
            $errors = $e->validator->errors()->toArray();
           
          return redirect("/home/signup")->withErrors($errors);
        }

    }

   
// login user

public function login2(Request $request)
{
  
    try {
     
        $userData = $request->validate([
            'UserEmail/Phone' => ["required", "string"],
            'Passphrase' => ["required"],
        ]);
       

      
        
        if ($userData) {
          
            $user = DB::table('users')
                ->where('UserEmail', $userData["UserEmail/Phone"])
                ->orWhere("Phone", $userData["UserEmail/Phone"])
                ->first();
              
            
            if ($user && Hash::check($userData['Passphrase'], $user->Passphrase)) {
                dd($user);
              if(auth()->attempt($userData)){
               
                  return redirect('/');
              } else{
                // dd($user);
                return redirect("/home/signup")->withErrors(["UserEmail/Phone" => "Inavlid Credentials!"]);
              }
            } else {
                    // dd($user);
                return redirect()->back()->withErrors(["UserEmail/Phone" => "Inavlid Credentials!"]);
            }
        }
        
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(["UserEmail/Phone" => "invalid user credentials"]);
    }
}

// $credentials = $request->only('UserEmail/Phone', 'Passphrase');
       
// dd(Auth::attempt($credentials));
//  if (Auth::attempt($credentials)) {
//      // Authentication passed
//      return redirect()->intended('/');
//  }else{
//      return redirect("/home/signup")->withErrors(["UserEmail/Phone" => "Inavlid Credentials!"]);
//  }
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response(['data', $user ], 200);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response(['data' => $user ], 200);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(['data' => null ], 204);
    }



    public function login(Request $request)
{
    try {
        // Validation rules
        $request->validate([
            'UserEmail/Phone' => ['required', 'string'],
            'Passphrase' => ['required'],
        ]);

        // Attempt to find the user by email or phone
        $user = DB::table('users')
            ->where('UserEmail', $request->input('UserEmail/Phone'))
            ->orWhere('Phone', $request->input('UserEmail/Phone'))
            ->first();

        // Check if the user exists and the passphrase is correct
        // $user["password"] = $user->
    //    dd($user);
        if ($user && Hash::check($request->input('Passphrase'), $user->Passphrase)) {
          dd(Auth::login($user));
           return redirect("/");
        } else {
            return redirect("/home/signin")->withErrors(['UserEmail/Phone' => 'Invalid Credentials 2!']);
        }
    } catch (\Exception $e) {
        dd($e->getMessage());
      //  return redirect("/home/signin")->withErrors(['UserEmail/Phone' => 'Invalid user credentials 3']);
    }
}


public function login88(Request $request)
{
 $userValidity =    $request->validate([
        'Username' => 'required',
        'Passphrase' => 'required',
    ]);



    $credentials = $request->only('Username', 'Passphrase');
    dd(Auth::attempt($credentials));
    if (Auth::attempt($credentials)) {
        dd(Auth::attempt($credentials));
        return redirect()->intended('/home/signup')
                    ->withSuccess('Signed in');
    }

    return redirect("/home/store")->withSuccess('Login details are not valid');
}
   
}



