<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangelogRequest;
use App\Models\Changelog;

class ChangelogController extends Controller
{
    public function index()
    {
        $changelogs = Changelog::get();

        return response(['data' => $changelogs ], 200);
    }

    public function store(ChangelogRequest $request)
    {
        $changelog = Changelog::create($request->all());

        return response(['data' => $changelog ], 201);

    }

    public function show($id)
    {
        $changelog = Changelog::findOrFail($id);

        return response(['data', $changelog ], 200);
    }

    public function update(ChangelogRequest $request, $id)
    {
        $changelog = Changelog::findOrFail($id);
        $changelog->update($request->all());

        return response(['data' => $changelog ], 200);
    }

    public function destroy($id)
    {
        Changelog::destroy($id);

        return response(['data' => null ], 204);
    }
}
