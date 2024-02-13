<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingcardRequest;
use App\Models\Billingcard;
use illuminate\Http\Request;

class BillingcardController extends Controller
{
    public function index()
    {
        $billingcards = Billingcard::get();

        return response(['data' => $billingcards ], 200);
    }

    public function cards(Request $request){
        $uuid = $request->uuid;
        $result = null;
        if(is_null($uuid)){
            $result = Billingcard::get();
        }else{
        $result = Billingcard::where('uuid', $uuid)->get();
    }
    return response(['data' => $result ], 200);
}
    public function store(BillingcardRequest $request)
    {
        $billingcard = Billingcard::create($request->all());

        return response(['data' => $billingcard ], 201);

    }

    public function show($id)
    {
        $billingcard = Billingcard::findOrFail($id);

        return response(['data', $billingcard ], 200);
    }

    public function update(BillingcardRequest $request, $id)
    {
        $billingcard = Billingcard::findOrFail($id);
        $billingcard->update($request->all());

        return response(['data' => $billingcard ], 200);
    }

    public function destroy($id)
    {
        Billingcard::destroy($id);

        return response(['data' => null ], 204);
    }
}
