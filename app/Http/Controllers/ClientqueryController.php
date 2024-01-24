<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientqueryRequest;
use App\Models\Clientquery;

class ClientqueryController extends Controller
{
    public function index()
    {
        $clientqueries = Clientquery::get();

        return response(['data' => $clientqueries ], 200);
    }

    public function store(ClientqueryRequest $request)
    {
        $clientquery = Clientquery::create($request->all());

        return response(['data' => $clientquery ], 201);

    }

    public function show($id)
    {
        $clientquery = Clientquery::findOrFail($id);

        return response(['data', $clientquery ], 200);
    }

    public function update(ClientqueryRequest $request, $id)
    {
        $clientquery = Clientquery::findOrFail($id);
        $clientquery->update($request->all());

        return response(['data' => $clientquery ], 200);
    }

    public function destroy($id)
    {
        Clientquery::destroy($id);

        return response(['data' => null ], 204);
    }
}
