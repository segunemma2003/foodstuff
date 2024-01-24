<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::get();

        return response(['data' => $addresses ], 200);
    }

    public function get_all_addresses(Request $request){
        $uuid = $request->uuid;
        $result = null;
        if(is_null($uuid)){
            $result = Address::get();
        }else{
        $result = Address::where('uuid', $uuid)->get();
    }
    return response(['data' => $result ], 200);
}

    public function store(AddressRequest $request)
    {
        $address = Address::create($request->all());

        return response(['data' => $address ], 201);

    }

    public function show($id)
    {
        $address = Address::findOrFail($id);

        return response(['data', $address ], 200);
    }

    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());

        return response(['data' => $address ], 200);
    }

    public function destroy($id)
    {
        Address::destroy($id);

        return response(['data' => null ], 204);
    }
}
