<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliateearningRequest;
use App\Models\Affiliateearning;
use illuminate\Http\Request;

class AffiliateearningController extends Controller
{
    public function index()
    {
        $affiliateearnings = Affiliateearning::get();

        return response(['data' => $affiliateearnings ], 200);
    }

    public function user_earnings(Request $request){
        $uuid = $request->uuid;
        $result = null;
        if(is_null($uuid)){
            $result = Affiliateearning::get();
        }else{
        $result = Affiliateearning::where('uuid', $uuid)->get();
    }
        return response(['data' => $result ], 200);
    }

    public function store(AffiliateearningRequest $request)
    {
        $affiliateearning = Affiliateearning::create($request->all());

        return response(['data' => $affiliateearning ], 201);

    }

    public function show($id)
    {
        $affiliateearning = Affiliateearning::findOrFail($id);

        return response(['data', $affiliateearning ], 200);
    }

    public function update(AffiliateearningRequest $request, $id)
    {
        $affiliateearning = Affiliateearning::findOrFail($id);
        $affiliateearning->update($request->all());

        return response(['data' => $affiliateearning ], 200);
    }

    public function destroy($id)
    {
        Affiliateearning::destroy($id);

        return response(['data' => null ], 204);
    }
}
