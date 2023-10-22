<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailinglistRequest;
use App\Models\Mailinglist;

class MailinglistController extends Controller
{
    public function index()
    {
        $mailinglists = Mailinglist::get();

        return response(['data' => $mailinglists ], 200);
    }

    public function store(MailinglistRequest $request)
    {
        $mailinglist = Mailinglist::create($request->all());

        return response(['data' => $mailinglist ], 201);

    }

    public function show($id)
    {
        $mailinglist = Mailinglist::findOrFail($id);

        return response(['data', $mailinglist ], 200);
    }

    public function update(MailinglistRequest $request, $id)
    {
        $mailinglist = Mailinglist::findOrFail($id);
        $mailinglist->update($request->all());

        return response(['data' => $mailinglist ], 200);
    }

    public function destroy($id)
    {
        Mailinglist::destroy($id);

        return response(['data' => null ], 204);
    }
}
