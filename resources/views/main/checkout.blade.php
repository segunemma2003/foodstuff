@extends('shared.layout')
@section('Title', 'Checkout')
@section('content')

    <style>
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #333;
        }

        textarea {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .modal-overlay {
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 200;
        }

        .modal-wrapper {
            width: 300px;
            height: 300px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .close-modal-btn {
            padding: 3px;
            background: rgb(42, 42, 44);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            color: ghostwhite;
            font-weight: 5px;
            margin-left: auto;
            cursor: pointer;
        }

        .close-btn-wrapper {
            display: flex;
        }

        .modal-content {
            margin: 20px auto;
            max-width: 210px;
            width: 100%;
        }

        .hide {
            display: none;
        }

        h1 {
            text-align: center;
        }

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
                                <li class="breadcrumb-item">
                                    <a asp-area="" asp-controller="Home" href="{{ URL('/') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">
                                    Checkout
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
            <!-- row Start -->
            <div class="row frm_submit_block">
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <div class="panel-group pay_opy980" id="payaccordion">
                        <!-- Default PickUp Address -->
                        <div class="panel panel-default border">
                            <div class="panel-heading" id="pay">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#"
                                        aria-expanded="true" aria-controls="payPal" class="">
                                        Delivery Address
                                    </a>
                                </h4>
                                <p class="">
                                    {{ $pick_up_address ?? 'No address registered' }}
                                </p>
                                <button style="background: none; border: none;" class="open-modal-btn">
                                    <a asp-area="" asp-controller="Home" asp-action="ManageAddresses"
                                        style="color:#E10C2C; cursor: pointer;">
                                        {{ $pick_up_address == null ? 'Add  a new delivery address' : 'Change address' }}
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- delivery address form --}}
                    <div class="modal-overlay hide">
                        <div class="modal-wrapper">
                            <div class="close-btn-wrapper">
                                <button class="close-modal-btn">
                                    Close
                                </button>
                            </div>
                            <div class="form-container">
                                <form action="{{route('saveDeliveryAddress')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="UUID" value="{{auth()->user()->UUID}}">
                                    <label for="deliveryAddress">Delivery Address:</label>
                                    <textarea id="deliveryAddress" name="Address" placeholder="Enter desired delivery address here" required>{{$pick_up_address}}</textarea>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="submit-page mb-4">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="a-2" class="checkbox-custom-label">Select a payment method
                                        below</label>
                                </div>
                            </div>

                        </div>
                        <!--/row -->
                    </div>

                    <div class="panel-group pay_opy980" id="payaccordion">

                        <!-- Pay By Account Balance -->


                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">

                                <div class="crp_box fl_color ovr_top">
                                    <div class="row align-items-center">


                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <!-- Pay By Paystack -->
                                            <form action="{{ route('pay') }}" method="post">
                                                @csrf
                                                <input type="number" value="{{ getInKobo() }}" class="form-control"
                                                    name="amount" hidden required />
                                                <input type="hidden" name="email"
                                                    value="{{ auth()->user()->UserEmail }}" />
                                                <input type="hidden" name="accountType"
                                                    value="{{ auth()->user()->accountType }}" />
                                                <input type="text" id="first-name" value="{{ auth()->user()->Username }}"
                                                    hidden />
                                                <input type="text" id="last-name" value="" hidden />
                                                {{-- <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> --}}
                                                <input type="hidden" name="currency" value="NGN">

                                                <div class="dro_140">
                                                    <div class="dro_141">
                                                        <img src="{{ asset('assets/img/PaystackLogo2.png') }}"
                                                            width="30" height="30" alt="Paystack brand logo">
                                                    </div>
                                                    <div class="dro_142">
                                                        <h6>Pay with Paystack {{ getInKobo() }}</h6>
                                                    </div>
                                                    <div class="dro_142">
                                                    </div>
                                                    <button type="submit" onclick="payWithPaystack()"
                                                        id="paystack-button">Pay</button>
                                                </div>

                                            </form>
                                        </div>






                                        {{--  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                                                <!-- Pay By Flutterwave -->
                                                <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                                                    <input type="number" value="@ViewBag.total" class="form-control" name="amount" hidden required />
                                                    <input type="hidden" name="public_key" value="FLWPUBK_TEST-bc53d85035a42cf5e6a708a256678ccf-X" />
                                                    <input type="hidden" name="customer[email]" value="@ViewBag.memberEmail" />
                                                    <input type="hidden" name="customer[name]" value="@ViewBag.username" />
                                                    <input type="hidden" name="tx_ref" value="bitethtx-019203" />

                                                    <input type="hidden" name="currency" value="NGN" />
                                                    <input type="hidden" name="meta[token]" value="54" />
                                                    <input type="hidden" name="redirect_url" id="redirectURL" value="@ViewBag.flutterwaveRedirectURL" />


                                                    <div class="dro_140">
                                                        <div class="dro_141">
                                                            <img src="~/assets/img/FlutterwaveLogo2.png" width="35" height="30" alt="Flutterwave brand logo">
                                                        </div>
                                                        <div class="dro_142">
                                                            <h6>Pay with Flutterwave</h6>
                                                        </div>
                                                        <div class="dro_142">
                                                        </div>
                                                        <button type="submit" id="flutterwave-button">Pay</button>
                                                    </div>

                                                </form>
                                            </div>  --}}


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- Col-lg 4 -->
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3>Your Order</h3>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="pro_product_wrap">
                            <h5>Premium</h5>
                            <ul>
                                <li><strong>Total Items</strong>{{ getTotalCart() }}</li>
                                <li><strong>Subtotal</strong>₦ {{ getSubTotalPrice() }}</li>
                                <li><strong>Tax</strong>5%</li>
                                <li>
                                    <strong>Total</strong> ₦ {{ getTotalPrice() }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <a href="{{ route('home.store') }}" type="button"
                            style="color: #E10C2C; background-color: transparent; border: none;"><span> ← </span>Continue
                            Shopping</a>

                    </div>

                </div>
                <!-- /col-lg-4 -->
            </div>
            <!-- /row -->

        </div>

        <script>
            const openBtn = document.querySelector(".open-modal-btn");
            const modal = document.querySelector(".modal-overlay");
            const closeBtn = document.querySelector(".close-modal-btn");

            function openModal() {
                modal.classList.remove("hide");
            }

            function closeModal(e, clickedOutside) {
                if (clickedOutside) {
                    if (e.target.classList.contains("modal-overlay"))
                        modal.classList.add("hide");
                } else modal.classList.add("hide");
            }

            openBtn.addEventListener("click", openModal);
            modal.addEventListener("click", (e) => closeModal(e, true));
            closeBtn.addEventListener("click", closeModal);
        </script>

    </section>
@endsection
