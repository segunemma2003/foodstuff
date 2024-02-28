<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Activity;
use App\Jobs\SendEmailQueueJob;
use Mail;
use App\Mail\OrderCreated;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return response(['data' => $orders ], 200);
    }

    public function store(OrderRequest $request)
    {
        // $order = Order::create($request->all());
        $uuid = $request->UUID;
        $paymentmethod = $request->PaymentMethod;
        $ordertype = $request->ordertype;
        $price = $request->price;
        $invoiceid = $request->InvoiceID;
        $status = $request->Status;
        $budget = $request->Budget;
        $address = $request->Address;
        $products_item = $request->products;
        // $total = $request->Total;
        // $tax = $request->Tax;
        $user= User::where("UUID", $uuid)->first();
        $order = null;
        $products = json_decode($products_item, true);
        // var_dump($products);
        if(!is_null($products) && count($products) > 0){
            foreach($products as $product){
                $carts = Cart::create([
                    "UUID" => $uuid,
                    "ProductID"=> $product['id'],
                    "Status"=>"Open",
                    "Quantity"=>$product['quantity'],
                    "OrderID"=>$invoiceid
                ]);

            }
            // \DB::commit();

        }else{
            return response()->json([
                "data"=>null,
                "message"=>"no data",
                "status"=>"failed"
            ],522);
        }
        if($ordertype =="cart"){

            if ($paymentmethod == "creditbalance") {
                $oldcredit = floatval($user->Credit);
                if($oldcredit < $price){
                    return response(['data' => "insufficient fund" ], 402);
                }

                $newcredit =  $oldcredit - floatval($price);
                $user->Credit =  $newcredit;
                $user->save();
            }

            $order = Order::create([
                "UUID"=>$uuid,
                "FullName"=>$user->Username,
                "InvoiceID"=> $invoiceid,
                "price"=> $price,
                "Tax" => 0,
                "Total"=> $price,
                "PaymentMethod"=> $paymentmethod,
                "Status"=>'pending',
                "Address"=>$address,
                "created_at"=>time()
            ]);

            $send_mail = [
                'segunemma2003@gmail.com',
                'youngpresido94@gmail.com',
                'tenebediana.foodstuffstore@gmail.com',
                'bomadokubo10@gmail.com',
                'maryusoh25@gmail.com',
                'suwaibatusaidu@gmail.com'
            ];



            $email = new OrderCreated($order, $user);
            Mail::to($send_mail)->queue($email);

        }elseif($ordertype == "requestedinvoice"){
            $invoice = Invoice::create([
                "UUID"=>$uuid,
                "InvoiceID"=> $invoiceid,
                "FullName"=> $user->Username,
                "Budget"=>$budget,
                "Status"=>$status,
                "Address"=>$address,
                "IsCartOrder"=>false
            ]);

        }

        $activity = Activity::create([
            // "uuid"=>
            "UUID"=>$uuid,
            "Message"=>"Successfully purchase item, order on it's way. Payment Method: $paymentmethod",
            "Seen"=>"false",
            "Type"=>"transaction"
        ]);

        // dispatch(new SendEmailQueueJob($send_mail));
        return response(['data' => "success" ], 201);

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
