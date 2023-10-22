<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevenueindexRequest;
use App\Models\Revenueindex;

class RevenueindexController extends Controller
{
    public function index()
    {
        $revenueindices = Revenueindex::get();

        return response(['data' => $revenueindices ], 200);
    }

    public function store(RevenueindexRequest $request)
    {
        $revenueindex = Revenueindex::create($request->all());

        return response(['data' => $revenueindex ], 201);

    }

    public function show($id)
    {
        $revenueindex = Revenueindex::findOrFail($id);

        return response(['data', $revenueindex ], 200);
    }

    public function update(RevenueindexRequest $request, $id)
    {
        $revenueindex = Revenueindex::findOrFail($id);
        $revenueindex->update($request->all());

        return response(['data' => $revenueindex ], 200);
    }

    public function destroy($id)
    {
        Revenueindex::destroy($id);

        return response(['data' => null ], 204);
    }
}
