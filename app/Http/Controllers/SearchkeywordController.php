<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchkeywordRequest;
use App\Models\Searchkeyword;

class SearchkeywordController extends Controller
{
    public function index()
    {
        $searchkeywords = Searchkeyword::get();

        return response(['data' => $searchkeywords ], 200);
    }

    public function store(SearchkeywordRequest $request)
    {
        $searchkeyword = Searchkeyword::create($request->all());

        return response(['data' => $searchkeyword ], 201);

    }

    public function show($id)
    {
        $searchkeyword = Searchkeyword::findOrFail($id);

        return response(['data', $searchkeyword ], 200);
    }

    public function update(SearchkeywordRequest $request, $id)
    {
        $searchkeyword = Searchkeyword::findOrFail($id);
        $searchkeyword->update($request->all());

        return response(['data' => $searchkeyword ], 200);
    }

    public function destroy($id)
    {
        Searchkeyword::destroy($id);

        return response(['data' => null ], 204);
    }
}
