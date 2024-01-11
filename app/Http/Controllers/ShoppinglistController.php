<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppinglistRequest;
use App\Models\Shoppinglist;
use Illuminate\Http\Request;

class ShoppinglistController extends Controller
{
    public function index()
    {
        $shoppinglists = Shoppinglist::get();

        return response(['data' => $shoppinglists ], 200);
    }

    public function store(ShoppinglistRequest $request)
    {
        $shoppinglist = Shoppinglist::create($request->all());

        return response(['data' => $shoppinglist ], 201);

    }

    public function store_in_bulk(Request $request){
        $data = $request->all();
        $shops = json_decode($data['items'], true);
      
        for($i=0; $i < count($shops); $i++){
            $shop = new Shoppinglist([
                "UUID" => $data['uuid'],
                "InvoiceID" => $data["invoice_id"],
                "Status" => "open",
                "Name" => $shops[$i]["name"],
                "Quantity" => $shops[$i]["quantity"],
                "Price" => "0.00"
            ]);
            $shop->save();
        }
        return response()->json([
            "status"=>"success"
        ]);
    }

    public function show($id)
    {
        $shoppinglist = Shoppinglist::findOrFail($id);

        return response(['data', $shoppinglist ], 200);
    }

    public function shopping_list(Request $request){
        $uuid = $request->uuid;
        $status = $request->status;
        $limit = $request->limit ?? 10;
        $invoiceid = $request->invoiceid;
        $result = null;
        if($uuid != null){
            $result = Shoppinglist::where('uuid','=',$uuid)
                                    ->where('invoiceid','=',$invoiceid)
                                    ->where('status','=',$status)
                                    ->orderBy('id','desc')
                                    ->limit($limit)
                                    ->get();

        }else{
            $result = Shoppinglist::all();
        }
        return response(['data'=> $result], 200);
    }

    public function update(ShoppinglistRequest $request, $id)
    {
        $shoppinglist = Shoppinglist::findOrFail($id);
        $shoppinglist->update($request->all());

        return response(['data' => $shoppinglist ], 200);
    }

    public function destroy($id)
    {
        Shoppinglist::destroy($id);

        return response(['data' => null ], 204);
    }
}
