<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::get();

        return response(['data' => $restaurants ], 200);
    }

    public function store(RestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->all());

        return response(['data' => $restaurant ], 201);

    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return response(['data', $restaurant ], 200);
    }

    public function update(RestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());

        return response(['data' => $restaurant ], 200);
    }

    public function destroy($id)
    {
        Restaurant::destroy($id);

        return response(['data' => null ], 204);
    }
}
