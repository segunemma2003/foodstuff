<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FoodStuff Store order created</title>
</head>
<body>
    <center>
        <h2>
            <a href="{{ env('APP_URL') }}">Visit Foodstuff store Admin</a>
        </h2>
</center>

<p>Hello Admin,</p>

<p>{{ "You have a new order from" }} {{ $user->Username }} </p>

<strong>Thanks & Regards.</strong>

</body>
</html>
