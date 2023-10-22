<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return response(['data' => $orders ], 200);
    }

    public function store(OrderRequest $request)
    {
        $order = Order::create($request->all());

        return response(['data' => $order ], 201);

    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response(['data', $order ], 200);
    }

    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return response(['data' => $order ], 200);
    }

    public function destroy($id)
    {
        Order::destroy($id);

        return response(['data' => null ], 204);
    }
}
