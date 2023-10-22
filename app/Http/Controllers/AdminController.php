<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::get();

        return response(['data' => $admins ], 200);
    }

    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());

        return response(['data' => $admin ], 201);

    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return response(['data', $admin ], 200);
    }

    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());

        return response(['data' => $admin ], 200);
    }

    public function destroy($id)
    {
        Admin::destroy($id);

        return response(['data' => null ], 204);
    }
}
