<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminactivityRequest;
use App\Models\Adminactivity;

class AdminactivityController extends Controller
{
    public function index()
    {
        $adminactivities = Adminactivity::get();

        return response(['data' => $adminactivities ], 200);
    }

    public function store(AdminactivityRequest $request)
    {
        $adminactivity = Adminactivity::create($request->all());

        return response(['data' => $adminactivity ], 201);

    }

    public function show($id)
    {
        $adminactivity = Adminactivity::findOrFail($id);

        return response(['data', $adminactivity ], 200);
    }

    public function update(AdminactivityRequest $request, $id)
    {
        $adminactivity = Adminactivity::findOrFail($id);
        $adminactivity->update($request->all());

        return response(['data' => $adminactivity ], 200);
    }

    public function destroy($id)
    {
        Adminactivity::destroy($id);

        return response(['data' => null ], 204);
    }
}
