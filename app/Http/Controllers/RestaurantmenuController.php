<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantmenuRequest;
use App\Models\Restaurantmenu;

class RestaurantmenuController extends Controller
{
    public function index()
    {
        $restaurantmenus = Restaurantmenu::get();

        return response(['data' => $restaurantmenus ], 200);
    }

    public function store(RestaurantmenuRequest $request)
    {
        $restaurantmenu = Restaurantmenu::create($request->all());

        return response(['data' => $restaurantmenu ], 201);

    }

    public function show($id)
    {
        $restaurantmenu = Restaurantmenu::findOrFail($id);

        return response(['data', $restaurantmenu ], 200);
    }

    public function update(RestaurantmenuRequest $request, $id)
    {
        $restaurantmenu = Restaurantmenu::findOrFail($id);
        $restaurantmenu->update($request->all());

        return response(['data' => $restaurantmenu ], 200);
    }

    public function destroy($id)
    {
        Restaurantmenu::destroy($id);

        return response(['data' => null ], 204);
    }
}
