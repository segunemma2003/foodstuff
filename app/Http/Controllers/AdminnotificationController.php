<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminnotificationRequest;
use App\Models\Adminnotification;

class AdminnotificationController extends Controller
{
    public function index()
    {
        $adminnotifications = Adminnotification::get();

        return response(['data' => $adminnotifications ], 200);
    }

    public function store(AdminnotificationRequest $request)
    {
        $adminnotification = Adminnotification::create($request->all());

        return response(['data' => $adminnotification ], 201);

    }

    public function show($id)
    {
        $adminnotification = Adminnotification::findOrFail($id);

        return response(['data', $adminnotification ], 200);
    }

    public function update(AdminnotificationRequest $request, $id)
    {
        $adminnotification = Adminnotification::findOrFail($id);
        $adminnotification->update($request->all());

        return response(['data' => $adminnotification ], 200);
    }

    public function destroy($id)
    {
        Adminnotification::destroy($id);

        return response(['data' => null ], 204);
    }
}
