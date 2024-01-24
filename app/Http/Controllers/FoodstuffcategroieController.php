<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodstuffcategroieRequest;
use App\Models\Foodstuffcategroie;

class FoodstuffcategroieController extends Controller
{
    public function index()
    {
        $foodstuffcategroies = Foodstuffcategroie::get();

        return response(['data' => $foodstuffcategroies ], 200);
    }

    public function store(FoodstuffcategroieRequest $request)
    {
        $foodstuffcategroie = Foodstuffcategroie::create($request->all());

        return response(['data' => $foodstuffcategroie ], 201);

    }

    public function show($id)
    {
        $foodstuffcategroie = Foodstuffcategroie::findOrFail($id);

        return response(['data', $foodstuffcategroie ], 200);
    }

    public function update(FoodstuffcategroieRequest $request, $id)
    {
        $foodstuffcategroie = Foodstuffcategroie::findOrFail($id);
        $foodstuffcategroie->update($request->all());

        return response(['data' => $foodstuffcategroie ], 200);
    }

    public function destroy($id)
    {
        Foodstuffcategroie::destroy($id);

        return response(['data' => null ], 204);
    }
}
