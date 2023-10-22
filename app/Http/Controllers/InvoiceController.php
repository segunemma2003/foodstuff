<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::get();

        return response(['data' => $invoices ], 200);
    }

    public function store(InvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());

        return response(['data' => $invoice ], 201);

    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return response(['data', $invoice ], 200);
    }

    public function update(InvoiceRequest $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return response(['data' => $invoice ], 200);
    }

    public function destroy($id)
    {
        Invoice::destroy($id);

        return response(['data' => null ], 204);
    }
}
