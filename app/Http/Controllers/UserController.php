<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use illuminate\Http\Request;

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

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return response(['data' => $user ], 201);

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
