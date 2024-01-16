<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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
               return  response()->json([
                    "message"=>"User Already Created",
                ], 404);
               }else{
                $user = new User();
                $createdUser  = $user->saveUser($userData);
              
                return  response()->json([
                    "message"=>"User created successfully",
                    "user"=>$createdUser
                ], 201);
               }
            
              }
        }catch(Exception $e){
          return response()->json([
                "error"=>$e->getMessage() 
          ], 404);
        }

    }

   
// login user


public function login(Request $request)
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
                return response()->json([
                    "message" => "User logged in successfully",
                ], 200);
            } else {
                return response()->json([
                    "message" => "Invalid login credentials",
                ], 401);
            }
        }
    } catch (\Exception $e) {
        return response()->json([
            "error" => $e->getMessage(),
        ], 500);
    }
}

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

   
}
