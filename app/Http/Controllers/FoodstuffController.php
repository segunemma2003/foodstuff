<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodstuffRequest;
use App\Models\Foodstuff;
use illuminate\Http\Request;


class FoodstuffController extends Controller
{
    public function index()
    {
        $foodstuffs = Foodstuff::get();

        return response(['data' => $foodstuffs ], 200);
    }


    public function active_index()
        {
            $foodstuffs = Foodstuff::where('status', 'active')->get();

            return response(['data' => $foodstuffs ], 200);
        }
    public function liked(Request $request){
        $uuid = $request->uuid;
        $status = $request->status;
        $limit = $request->limit ?? 10;
        $result = null;
        if(is_null($uuid)){
            $result = Foodstuff::has('likes')->with('likes')->get();
        }else{
        $result = Foodstuff::whereHas('likes', function($query) use($uuid){
            $query->where('uuid', $uuid);
        })->get();
    }
        return response(['data'=>$result, 'uuid'=>$uuid], 200);
    }


    public function store(FoodstuffRequest $request)
    {
        $foodstuff = Foodstuff::create($request->all());

        return response(['data' => $foodstuff ], 201);

    }

    public function show($id)
    {
        $foodstuff = Foodstuff::findOrFail($id);

        return response(['data', $foodstuff ], 200);
    }

    public function update(FoodstuffRequest $request, $id)
    {
        $foodstuff = Foodstuff::findOrFail($id);
        $foodstuff->update($request->all());

        return response(['data' => $foodstuff ], 200);
    }

    public function destroy($id)
    {
        Foodstuff::destroy($id);

        return response(['data' => null ], 204);
    }
}
