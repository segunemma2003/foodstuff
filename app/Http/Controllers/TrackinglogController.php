<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackinglogRequest;
use App\Models\Trackinglog;

class TrackinglogController extends Controller
{
    public function index()
    {
        $trackinglogs = Trackinglog::get();

        return response(['data' => $trackinglogs ], 200);
    }

    public function store(TrackinglogRequest $request)
    {
        $trackinglog = Trackinglog::create($request->all());

        return response(['data' => $trackinglog ], 201);

    }

    public function show($id)
    {
        $trackinglog = Trackinglog::findOrFail($id);

        return response(['data', $trackinglog ], 200);
    }

    public function update(TrackinglogRequest $request, $id)
    {
        $trackinglog = Trackinglog::findOrFail($id);
        $trackinglog->update($request->all());

        return response(['data' => $trackinglog ], 200);
    }

    public function destroy($id)
    {
        Trackinglog::destroy($id);

        return response(['data' => null ], 204);
    }
}
