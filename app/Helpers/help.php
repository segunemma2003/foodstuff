<?php



function isEmptyCart(){
   return Cart::session(auth()->user()->ID)->isEmpty();
}

function getContent(){
    $cartCollection = Cart::session(auth()->user()->ID)->getContent();

    return $cartCollection;
}

function checkItem($itemId){
    $items = Cart::session(auth()->user()->ID)->getContent()->toArray();
// dd($items);
    return array_reduce($items, function ($carry, $item) use ($itemId) {
        // dd($item['id']);
        return $carry || ($item["id"] == $itemId);
    }, false);
}

function getTotalCart(){
    $cartCollection = Cart::session(auth()->user()->ID)->getContent();
    // dd(getTotalCart());
    return count($cartCollection);
}

function getSubTotalPrice(){
  return  Cart::session(auth()->user()->ID)->getSubTotal();
}

function getInKobo(){
    $subtotal = Cart::session(auth()->user()->ID)->getSubTotal();
    $tax = $subtotal * 0.05;
    $total = $subtotal + $tax;
    return $total * 100;
}

function getTotalPrice(){
    $subtotal = Cart::session(auth()->user()->ID)->getSubTotal();
    $tax = $subtotal * 0.05;
    $total = $subtotal + $tax;
    return $total;
}



