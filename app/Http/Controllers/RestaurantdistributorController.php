<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantdistributorRequest;
use App\Models\Restaurantdistributor;

class RestaurantdistributorController extends Controller
{
    public function index()
    {
        $restaurantdistributors = Restaurantdistributor::get();

        return response(['data' => $restaurantdistributors ], 200);
    }

    public function store(RestaurantdistributorRequest $request)
    {
        $restaurantdistributor = Restaurantdistributor::create($request->all());

        return response(['data' => $restaurantdistributor ], 201);

    }

    public function show($id)
    {
        $restaurantdistributor = Restaurantdistributor::findOrFail($id);

        return response(['data', $restaurantdistributor ], 200);
    }

    public function update(RestaurantdistributorRequest $request, $id)
    {
        $restaurantdistributor = Restaurantdistributor::findOrFail($id);
        $restaurantdistributor->update($request->all());

        return response(['data' => $restaurantdistributor ], 200);
    }

    public function destroy($id)
    {
        Restaurantdistributor::destroy($id);

        return response(['data' => null ], 204);
    }
}
