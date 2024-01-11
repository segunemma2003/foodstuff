<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use DB;
use illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::get();

        return response(['data' => $carts ], 200);
    }

    public function store(CartRequest $request)
    {
        $cart = Cart::create($request->all());

        return response(['data' => $cart ], 201);

    }

    public function fetch_cart(Request $request){
        $uuid = $request->uuid;
        $status = $request->status;
        $limit = $request->limit ?? 10;

        $result = Cart::with('foodstuff')->get();
        return response(['data', $result], 200);
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);

        return response(['data', $cart ], 200);
    }

    public function update(CartRequest $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());

        return response(['data' => $cart ], 200);
    }

    public function destroy($id)
    {
        Cart::destroy($id);

        return response(['data' => null ], 204);
    }
}
