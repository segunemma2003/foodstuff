<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FoodStuff Store Order Created</title>
</head>
<body>
    <center>
        <h2>
            <a href="{{ env('APP_URL') }}">Visit Foodstuff Store Admin</a>
        </h2>
    </center>

    <p>Hello Admin,</p>

    <p>You have a new order from {{ $user->Username }}.</p>

    <p><strong>Order Details:</strong></p>

    <ul>
        <li><strong>User:</strong> {{ $user->Username }}</li>
        <li><strong>Address:</strong> {{ $order->Address }}</li>
        <li><strong>Order:</strong></li>
        <ul>
            @foreach($order->carts as $cart)
            @if($cart->status=="open" || $cart->status=="Open")
            <li>{{ $cart->product->Name }} - Quantity: {{ $cart->Quantity }} - Price: {{ $cart->price }}</li>
           @endif
            @endforeach
        </ul>
        <li><strong>Total Amount:</strong> NGN{{ $order->price }}</li>
    </ul>

    <p>Thanks & Regards.</p>

</body>
</html>
