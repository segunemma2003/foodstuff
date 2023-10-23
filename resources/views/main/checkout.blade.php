@extends('shared.layout')
@section('Title', "Checkout")
@section('content')
<style>
    #paystack-button {
        cursor: pointer;
        position: relative;
        background-color: #23A6DA;
        color: #fff;
        max-width: 30%;
        padding: 10px;
        font-weight: 600;
        font-size: 14px;
        border-radius: 10px;
        border: none;
        transition: all .1s ease-in;
    }

    #flutterwave-button {
        cursor: pointer;
        position: relative;
        background-color: #FB9C1D;
        color: #303030;
        max-width: 30%;
        padding: 10px;
        font-weight: 600;
        font-size: 14px;
        border-radius: 10px;
        border: none;
        transition: all .1s ease-in;
    }
</style>

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">
                        Checkout
                    </h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            {{-- <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li> --}}
                            
                            <li class="breadcrumb-item">
                                {{-- <a href="{{ route('home', ['page' => $prevPageLink]) }}">
                                    {{ $prevPageName }}
                                </a> --}}
                                <a href="#">
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                {{-- {{ $corePageName }} --}}
                            </li>
                            

                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Checkout ================================== -->

<section class="gray-simple">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Cart</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                {{-- <a href="{{ route('home', ['prevPageLink' => $prevPageLink]) }}"> --}}
                                <a href="">
                                    {{-- {{ $prevPageName }} --}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                {{-- {{ $corePageName }} --}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section -->
<section class="pt-0">
    <div class="container">
        <br />
        @if (session('SuccessMessage'))
            <div class="form-group">
                <div class="alert alert-success">
                    ✔ {{ session('SuccessMessage') }}
                </div>
            </div>
        @endif
        @if (session('ErrorMessage'))
            <div class="form-group">
                <div class="alert alert-warning">
                    ⚠ {{ session('ErrorMessage') }}
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="table-responsive">
                @if ($cart != null)
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($cart as $data)
                        @php
                            $i++;
                        @endphp
                    @endforeach

                    @if ($i > 0)
                        <table class="table table-striped wishlist">
                            <tbody>
                                @foreach ($cart as $data)
                                    <tr>
                                        <td>
                                            {{-- <form method="POST" action="{{ route('deleteCartItem', $data->ID) }}"> --}}
                                            <form method="POST" action="">
                                                @csrf
                                                <button class="remove_cart" type="submit" title="Remove from cart"><i class="ti-close"></i></button>
                                            </form>
                                        </td>
                                        <td><div class="tb_course_thumb"><img src="{{ $data->Image }}" class="img-fluid" alt="" /></div></td>
                                        <th>
                                            {{ $data->Name }}
                                            <span class="tb_date">
                                                {{-- @if (ValueHelper::ISADecimal($data->Price) && ValueHelper::ISANumber($data->Quantity))
                                                    @php
                                                        $sum = intval($data->Price) * intval($data->Quantity);
                                                    @endphp --}}
                                                    <p>Sum: ₦
                                                        {{-- {{ $sum }} --}}
                                                    </p>
                                                {{-- @endif --}}
                                            </span>
                                        </th>
                                        <td><span class="wish_price theme-cl">₦{{ $data->Price }}</span></td>
                                        <td><input type="number" id="input_{{ $data->ID }}" style="background-color: transparent; width:75px; border: none;" onkeypress="this.style.width = ((this.value.length + 1) * 18) + 'px';" value="{{ $data->Quantity }}" /></td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="drp-select dropdown-menu">
                                                    {{-- <form method="POST" action="{{ route('saveQuantity', $data->ID) }}"> --}}
                                                    <form method="POST" action="">
                                                        @csrf
                                                        <input type="text" name="Quantity" id="quantityInput_{{ $data->ID }}" hidden />
                                                        <button onclick="SaveQuantityFunc('{{ $data->ID }}')" class="dropdown-item" type="submit">Save Changes</button>
                                                    </form>
                                                    {{-- <form method="POST" action="{{ route('addQuantityCartItem', $data->ID) }}"> --}}
                                                    <form method="POST" action="">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Add Quantity</button>
                                                    </form>
                                                    {{-- <form method="POST" action="{{ route('removeQuantityCartItem', $data->ID) }}"> --}}
                                                    <form method="POST" action="">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Remove Quantity</button>
                                                    </form>
                                                    {{-- <form method="POST" action="{{ route('resetQuantityCartItem', $data->ID) }}"> --}}

                                                    <form method="POST" action="">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Reset Quantity</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/EmptyCart.png') }}" style="width:50%;" class="img-fluid" alt="" />
                                    <br /><br />
                                    <h4>Your cart is empty! Return to the store and add some food items.</h4>
                                    <br />
                                    {{-- <a href="{{ route('store') }}" class="btn btn-md full-width theme-bg text-white">Return To Store</a> --}}
                                    <a href="" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-10">
                            <div class="text-center">
                                <img src="{{ asset('assets/img/EmptyCart.png') }}" style="width:50%;" class="img-fluid" alt="" />
                                <br /><br />
                                <h4>Your cart is empty! Return to the store and add some food items.</h4>
                                <br />
                                {{-- <a href="{{ route('store') }}" class="btn btn-md full-width theme-bg text-white">Return To Store</a> --}}

                                <a href="" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if ($cartItemCount != 0)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="dash_crs_cat">
                        <div class="dash_crs_cat_caption">
                            <div class="dash_crs_cat_body">
                                <ul>
                                    <li>
                                        @if ($cartItemCount > 1)
                                            <h6>You have {{ $cartItemCount }} items in your cart</h6>
                                        @else
                                            <h6>You have just {{ $cartItemCount }} item in your cart</h6>
                                        @endif
                                    </li>
                                    <li>
                                        <h6>Tax: 
                                            <span>
                                            {{-- {{ $shippingCost }} --}}
                                            %
                                        </span>
                                    </h6></li>
                                    <li><h6>Sub Total: 
                                        <span>
                                            ₦
                                            {{-- {{ $cartTotal }} --}}
                                        </span></h6>
                                    </li>
                                    <li>
                                        <h6>Total: <span>
                                            {{-- @php
                                                $total = doubleval($cartTotal) + (doubleval($cartTotal) * (doubleval($shippingCost) / 100));
                                                $total2 = ValueHelper::BalanceFormatter('₦', $total);
                                            @endphp
                                            {{ $total2 }} --}}
                                        </span></h6>
                                    </li>
                                    <li>
                                        {{-- <a href="{{ route('checkout') }}" class="btn btn-md full-width theme-bg text-white">Checkout</a> --}}
                                        <a href="" class="btn btn-md full-width theme-bg text-white">Checkout</a>
                                    </li>
                                    <li>
                                        {{-- <form method="POST" action="{{ route('jumpToHome') }}"> --}}
                                        <form method="POST" action="">
                                            <button type="submit" style="color: #E10C2C; background-color: transparent; border: none;"><span> ← </span>Continue Shopping</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- Cart End Section -->


@push('scripts')
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: '@ViewBag.paystackPublicKey', // Replace with your public key
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function () {
                    alert('Payment canceled.');
                },
                callback: function (response) {
                    let ourReference = response.reference;
                    let ourMessage = response.message;
                    let ourStatus = response.status;
    
                    if (ourMessage == "Approved" && ourStatus == "success") {
                        var eml = document.getElementById("email").value
                        var topupamount = document.getElementById("amount").value
                        /**/
                        window.location.href = "https://foodstuff.store/Home/Checkout?Email=" + eml + "&topup=" + topupamount + "&paymentmethod=Paystack&status=success&transaction_id=" + ourReference + "";
                        /**/
                    }
                }
            });
            handler.openIframe();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swipe-pay@2.0.1"></script>
    <script src="{{ asset('swipe-pay-widget.js') }}"></script>
@endpush


@endsection