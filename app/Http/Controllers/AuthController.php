<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "UserEmail" => "required|email|unique:users",
            "Phone" => "required|unique:users"
        ]);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return response()->json([
                "status"=>"failed",
                "message"=>$errorMessage
            ]);
        }
        $data = $user->saveUser($request)
            ->generateAndSaveApiAuthToken();
        return response()->json([
            "status"=> "success",
            "data"=>$data
        ], 201);
    }


    public function google_auth_reg(Request $request, User $users){
        $user = User::where("UserEmail", $request->UserEmail)->where("AccountType", $request->AccountType)->first();
        if(!is_null($user)){
            Auth::login($user);
                    $user = Auth::user()
                            ->generateAndSaveApiAuthToken();
            return response()->json([
                "status"=>"success",
                "data" => $user,
                "new" => false
            ], 200);
        }else {
            $d = User::where("UserEmail", $request->UserEmail)->first();
            if(is_null($d)){
                $data = $users->saveGoogleUser($request)
                ->generateAndSaveApiAuthToken();
                return response()->json([
                    "status"=> "success",
                    "new"=> true,
                    "data"=>$data
                ], 200);
        }else{
            return response()->json([
                "status"=>"failed",
                "message"=> "kindly login with password"
            ]);
        }

        }

    }

    public function login(Request $request)
    {
        try{
            $credentials = [
                'UserEmail' => $request->UserEmail,
                'Passphrase' => $request->Passphrase,
            ];

            $user = User::where("UserEmail", $request->UserEmail)->first();

            if(!is_null($user)){
                $result = $user->Passphrase;

                // if(\Hash::check($request->Passphrase, $result)){

                    Auth::login($user);
                    $user = Auth::user()
                            ->generateAndSaveApiAuthToken();
                    return response()->json([
                        "data" => $user,
                        "status"=> "success"
                    ], 200);
                // }
            }
            return response()->json(['message' => 'Error.....', "status"=>"failed"], 401);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Authentication failed: ' . $e->getMessage());
            return response()->json(['message' => $e->getMessage(), "status"=>"failed"], 401);
        }

    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['Success' => 'Logged out'], 200);
    }
}
