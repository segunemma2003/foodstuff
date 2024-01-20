<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodStuff;
use Cart;


class LogicController extends Controller
{
    public function addToCart($id, $quantity){
        try{
        $foodStuff = FoodStuff::where('ID',$id)->first();
        $is_added = checkItem($foodStuff->id);

        if(is_null($foodStuff)){
            abort(404);
        }
        // dd($quantity);
if(!is_null($is_added)){
    // dd(auth()->user()->ID);
    Cart::session(auth()->user()->ID)->add([
        'id' => $foodStuff->ID, // inique row ID
'name' => $foodStuff->Name,
'price' => $foodStuff->Price,
'quantity' => $quantity
    ]);
    return redirect()->back();
}else{
    Cart::update($foodStuff->ID,[
        'quantity' =>  array(
            'relative' => false,
            'value' => $quantity
        )
    ]);
}

        }catch(\Exception $e){
            dd($e);
            abort(404);
        }
    }

}
