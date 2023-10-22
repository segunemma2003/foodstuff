<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogpostRequest;
use App\Models\Blogpost;

class BlogpostController extends Controller
{
    public function index()
    {
        $blogposts = Blogpost::get();

        return response(['data' => $blogposts ], 200);
    }

    public function store(BlogpostRequest $request)
    {
        $blogpost = Blogpost::create($request->all());

        return response(['data' => $blogpost ], 201);

    }

    public function show($id)
    {
        $blogpost = Blogpost::findOrFail($id);

        return response(['data', $blogpost ], 200);
    }

    public function update(BlogpostRequest $request, $id)
    {
        $blogpost = Blogpost::findOrFail($id);
        $blogpost->update($request->all());

        return response(['data' => $blogpost ], 200);
    }

    public function destroy($id)
    {
        Blogpost::destroy($id);

        return response(['data' => null ], 204);
    }
}
