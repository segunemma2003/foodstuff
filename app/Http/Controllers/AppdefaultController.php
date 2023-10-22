<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppdefaultRequest;
use App\Models\Appdefault;

class AppdefaultController extends Controller
{
    public function index()
    {
        $appdefaults = Appdefault::get();

        return response(['data' => $appdefaults ], 200);
    }

    public function store(AppdefaultRequest $request)
    {
        $appdefault = Appdefault::create($request->all());

        return response(['data' => $appdefault ], 201);

    }

    public function show($id)
    {
        $appdefault = Appdefault::findOrFail($id);

        return response(['data', $appdefault ], 200);
    }

    public function update(AppdefaultRequest $request, $id)
    {
        $appdefault = Appdefault::findOrFail($id);
        $appdefault->update($request->all());

        return response(['data' => $appdefault ], 200);
    }

    public function destroy($id)
    {
        Appdefault::destroy($id);

        return response(['data' => null ], 204);
    }
}
