<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantdishRequest;
use App\Models\Restaurantdish;

class RestaurantdishController extends Controller
{
    public function index()
    {
        $restaurantdishes = Restaurantdish::get();

        return response(['data' => $restaurantdishes ], 200);
    }

    public function store(RestaurantdishRequest $request)
    {
        $restaurantdish = Restaurantdish::create($request->all());

        return response(['data' => $restaurantdish ], 201);

    }

    public function show($id)
    {
        $restaurantdish = Restaurantdish::findOrFail($id);

        return response(['data', $restaurantdish ], 200);
    }

    public function update(RestaurantdishRequest $request, $id)
    {
        $restaurantdish = Restaurantdish::findOrFail($id);
        $restaurantdish->update($request->all());

        return response(['data' => $restaurantdish ], 200);
    }

    public function destroy($id)
    {
        Restaurantdish::destroy($id);

        return response(['data' => null ], 204);
    }
}
