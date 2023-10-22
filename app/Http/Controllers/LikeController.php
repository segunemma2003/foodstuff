<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use App\Models\Like;

class LikeController extends Controller
{
    public function index()
    {
        $likes = Like::get();

        return response(['data' => $likes ], 200);
    }

    public function store(LikeRequest $request)
    {
        $like = Like::create($request->all());

        return response(['data' => $like ], 201);

    }

    public function show($id)
    {
        $like = Like::findOrFail($id);

        return response(['data', $like ], 200);
    }

    public function update(LikeRequest $request, $id)
    {
        $like = Like::findOrFail($id);
        $like->update($request->all());

        return response(['data' => $like ], 200);
    }

    public function destroy($id)
    {
        Like::destroy($id);

        return response(['data' => null ], 204);
    }
}
