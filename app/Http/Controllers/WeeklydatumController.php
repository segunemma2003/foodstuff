<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeeklydatumRequest;
use App\Models\Weeklydatum;

class WeeklydatumController extends Controller
{
    public function index()
    {
        $weeklydata = Weeklydatum::get();

        return response(['data' => $weeklydata ], 200);
    }

    public function store(WeeklydatumRequest $request)
    {
        $weeklydatum = Weeklydatum::create($request->all());

        return response(['data' => $weeklydatum ], 201);

    }

    public function show($id)
    {
        $weeklydatum = Weeklydatum::findOrFail($id);

        return response(['data', $weeklydatum ], 200);
    }

    public function update(WeeklydatumRequest $request, $id)
    {
        $weeklydatum = Weeklydatum::findOrFail($id);
        $weeklydatum->update($request->all());

        return response(['data' => $weeklydatum ], 200);
    }

    public function destroy($id)
    {
        Weeklydatum::destroy($id);

        return response(['data' => null ], 204);
    }
}
