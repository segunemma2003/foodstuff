<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();

        return response(['data' => $faqs ], 200);
    }

    public function store(FaqRequest $request)
    {
        $faq = Faq::create($request->all());

        return response(['data' => $faq ], 201);

    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);

        return response(['data', $faq ], 200);
    }

    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        return response(['data' => $faq ], 200);
    }

    public function destroy($id)
    {
        Faq::destroy($id);

        return response(['data' => null ], 204);
    }
}
