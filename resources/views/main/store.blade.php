@extends('shared.layout')
@section('Title', 'Store')
@section('content')

    <!-- ============================ Store Items ================================== -->
    <section class="gray mt-5">
        
        <div class="container" style="width: 100%; overflow-x: hidden">

            <div class="row justify-content-center">
                <div b-cti5zrxsij class="container">
                    <nav b-cti5zrxsij id="navigation" class="navigation navigation-landscape">
                        <form action="/SearchFoodStuff" method="POST">
                            <div b-cti5zrxsij class="row align-items-end">
                                <div b-cti5zrxsij class="col-xl-9 col-lg-9 col-md-6 col-sm-11">
                                    <div b-cti5zrxsij class="form-group">
                                        <div b-cti5zrxsij class="smalls input-with-icon">
                                            <input b-cti5zrxsij spellcheck="true" autocomplete="on" type="text"
                                                name="keyboard" max="100" maxlength="100"
                                                placeholder="Search For Food Items" class="form-control" style="height:54px"
                                                required>
                                            <i class="ti-search"></i>
                                            <input b-cti5zrxsij name="offset" value="0" hidden>
                                            <input b-cti5zrxsij name="limit" value="20" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-11 ">
                                    <div b-cti5zrxsij class="form-group ">
                                        <div class="input-group">
                                            <div class="col-10">
                                                <select name="category" class="form-control  select2-hidden-accesible "
                                                    style="width:100% !important" id="cates" data-select2-id="cates"
                                                    tabindex="-1" aria-hidden="true">
                                                    <option value="all" selected data-selected2-id="2">
                                                        All Category
                                                    </option>
                                                    <option value="Vegetable">
                                                        Vegetable
                                                    </option>
                                                    <option value="Protein">
                                                        Protein
                                                    </option>
                                                    <option value="Seasoning">
                                                        Seasoning
                                                    </option>
                                                    <option value="Fruits">
                                                        Fruits
                                                    </option>
                                                    <option value="Grains">
                                                        Grains
                                                    </option>
                                                    <option value="Nuts">
                                                        Nuts
                                                    </option>
                                                    <option value="Processed">
                                                        Processed
                                                    </option>
                                                    <option value="Fuids">
                                                        Fluids
                                                    </option>
                                                    <option value="Live stock">
                                                        Livestock
                                                    </option>
                                                    <option value="Seeds">
                                                        Seeds
                                                    </option>
                                                </select>
                                            </div>
                                            <span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="1" style="width: 100% !important">
                                            </span>

                                            </span>
                                            <div class="input-group-append">
                                                <button type="submit" class="input-group-text theme-bg b-0 text-light"
                                                    style="border:none; width:54px; height:54px">
                                                    <span class="ti-search"></span>
                                                </button>

                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>
                        </form>
                    </nav>

                </div>
                @if ($foodStuffs != null)
                    @php $i = 0; @endphp
                    @foreach ($foodStuffs as $data)
                        @php $i++; @endphp
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 px-3">
                            <div class="crs_grid shadow_none brd">
                                <div class="crs_grid_thumb">
                                    <a href="#" data-toggle="modal" data-target="#desc_{{ $data->id }}"
                                        class="crs_detail_link">
                                        <img src="{{ $data->Image }}" class="img-fluid rounded"
                                            style="background-color: #F7F8F9;" alt="{{ $data->Name }}" />
                                    </a>


                                    <div class="crs_video_ico">
                                        @if (!empty($uuid))
                                            <button type="button" onclick="SubmitLikeForm('{{ $data->ProductID }}')"
                                                style="background-color:transparent; border:none;">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#login">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                {{-- new section starts --}}
                                <div class="crs_grid_gaption">
                                    <div class="crs_title">
                                        <h6>
                                            <a href="#" data-toggle="modal" data-target="#desc_266"
                                                class="crs_title_link">

                                                {{ $data->Name }}
                                            </a>
                                        </h6>
                                    </div>
                                    <div class="crs_info_details">
                                        <ul>
                                            <li>
                                                <div class="crs_fl_last">
                                                    <div class="crs_price">
                                                        <h4>
                                                            <span class="currency">₦</span>
                                                            <span style="margin-left: 0px; padding-left:0px"
                                                                class="theme-cl">{{ $data->Price }}</span>
                                                        </h4>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                {{-- button section starts --}}
                                <div class="preview_crs_info">
                                    @auth
                                        @if (checkItem($data->ID))
                                            <a type="button" href="{{ route('removeCart', $data->ID) }}"
                                                class="btn btn-md full-width bg-dark text-white " fdprocessedid ="ffwzg">
                                                Remove Cart
                                            </a>
                                        @else
                                            {{--  <input name="" value="{{$data->ID}}" hidden />  --}}
                                            <a type="button" href="{{ route('addToCart', [$data->ID, 1]) }}"
                                                id="cartButtonTexta-{{ $data->ID }}"
                                                class="btn btn-md full-width theme-bg text-white " fdprocessedid ="ffwzg">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        @endif
                                    @else
                                        <a type="button" href="{{ route('addToCart', [$data->ID, 1]) }}"
                                            id="cartButtonTexta-{{ $data->ID }}"
                                            class="btn btn-md full-width theme-bg text-white " fdprocessedid ="ffwzg">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="desc_{{ $data->ID }}" tabindex="-1" role="dialog"
                            aria-labelledby="loginoutmodal" aria-hidden="true">
                            <div class="modal-dialog modal-xl login-pop-form" role="document">
                                <div class="modal-content overli" id="loginmodal">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Product Description</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="login-form">
                                            <div class="rcs_log_125 pt-2 pb-3">
                                                <img src="{{ $data->Image }}" class="img-fluid rounded"
                                                    style="background-color: #F7F8F9;" />
                                            </div>
                                            <div class="crs_grid_caption">
                                                <div class="crs_title">
                                                    <h6>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#desc_{{ $data->ID }}"
                                                            class="crs_title_link">
                                                            {{ $data->Name }}
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div class="crs_info_detail">
                                                    <ul>
                                                        <li>
                                                            <div class="crs_fl_last">
                                                                <div class="crs_price">
                                                                    <h4><span class="currency">₦</span><span
                                                                            class="theme-cl">{{ $data->Price }}</span>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="crs_title">
                                                    <div class="property_block_wrap_header">
                                                        <ul class="nav nav-tabs customize-tab tabs_creative col-12"
                                                            id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="general-tab"
                                                                    data-toggle="tab" href="#general_{{ $data->ID }}"
                                                                    role="tab" aria-controls="general"
                                                                    aria-selected="true">Description</a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link" id="payment-tab" data-toggle="tab"
                                                                    href="#payment_{{ $data->ID }}" role="tab"
                                                                    aria-controls="payment" aria-selected="false">More</a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link" id="upgrade-tab" data-toggle="tab"
                                                                    href="#upgrade_{{ $data->ID }}" role="tab"
                                                                    aria-controls="upgrade"
                                                                    aria-selected="false">Reviews</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="crs_title">
                                                    <div class="tab-content tabs_content_creative" id="myTabContent">

                                                        <!-- general Query -->
                                                        <div class="tab-pane fade show active"
                                                            id="general_{{ $data->ID }}" role="tabpanel"
                                                            aria-labelledby="general-tab">
                                                            <p><span>{{ $data->Description }}</span></p>
                                                        </div>

                                                        <!-- general Query -->
                                                        <div class="tab-pane fade" id="payment_{{ $data->ID }}"
                                                            role="tabpanel" aria-labelledby="payment-tab">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Product ID</th>
                                                                            <td>
                                                                                {{ '#' }}{{ $data->ProductID }}

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Unit/Weight</th>
                                                                            <td>{{ $data->Unit }} / {{ $data->Weight }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Shipping</th>
                                                                            <td>{{ $data->Shipping }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Warranty & Return Policy
                                                                            </th>
                                                                            <td>{{ $data->ProductPolicy }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <!-- general Query -->
                                                        <div class="tab-pane fade" id="upgrade_{{ $data->ID }}"
                                                            role="tabpanel" aria-labelledby="upgrade-tab">

                                                            <div class="alert alert-warning" role="alert">
                                                                This item has no reviews yet
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rcs_log_126 full">
                                                <ul class="social_log_45 row">
                                                    <li class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                        <button type="button" class="close sl_btn"
                                                            data-dismiss="modal">Close</button>
                                                    </li>
                                                    <li class="col-xl-6 col-lg-6 col-md-6 col-6">

                                                        <button type="button"
                                                            onclick="SubmitCartForm({{ $data->ProductID }})"
                                                            class="btn btn-md full-width theme-bg text-white">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </button>

                                                        <a asp-area="" asp-controller="Home" asp-action="SignIn"
                                                            class="btn btn-md full-width theme-bg text-white"
                                                            style="text-align:center;">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>


                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="crs_log__footer d-flex justify-content-between mt-0"
                                        style="margin-bottom:50px;">
                                        <br />
                                        <br />
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row justify-content-center">
                        <div></div>
                        <div class="col-lg-6 col-md-10">
                            <div class="text-center">

                                <img src="{{ asset('assets/img/EmptyActivity.png') }}" style="width:50%;"
                                    class="img-fluid" alt="" />
                                <br /><br />
                                <p>
                                    We found nothing!
                                </p>

                            </div>
                        </div>

                    </div>
                @endif
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        {{ $foodStuffs->links() }}
                    </nav>
                </div>
            </div>


            <div class="row align-items-center justify-content-between mt-4">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <button type="submit" style="color:#E10C2C; background-color:transparent; border:none;"><span> ←
                        </span>Back
                        To Home </button>

                </div>
            </div>

        </div>
        {{--  <div class="clearfix"></div>  --}}



    </section>

    <script>
        function SubmitCartForm(prodID) {
            document.getElementById("productid").value = prodID;

            $.ajax({
                url: 'https://foodstuffstore.net/FoodStuffStore.php',
                type: 'POST',
                data: $('#addToCartForm').serialize(),
                error: function(xhr, status, error) {

                },
                success: function(response) {

                }
            });
            document.getElementById("alertSnackBar").value = "🛍️  Item added to cart";
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);

            $('#cartItemCount').val(function(i, oldval) {
                return ++oldval;
            });

        }

        function SubmitLikeForm(prodID) {
            document.getElementById("productid2").value = prodID;
            $.ajax({
                url: 'https://foodstuffstore.net/FoodStuffStore.php',
                type: 'POST',
                data: $('#likeAnItemForm').serialize(),
                error: function(xhr, status, error) {

                },
                success: function(response) {

                }
            });
            document.getElementById("alertSnackBar").value = "You ❤️ an item";
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);

        }

        int width = (Request.Browser.ScreenPixelsWidth) * 2 - 100;
        int height = (Request.Browser.ScreenPixelsHeight) * 2 - 100;


        @ * Set data on description dialog * @

        function setDescription(img, name) {
            document.getElementById("descImage").src = img;
            document.getElementById('descNameLabel').innerHTML = name;
        }
    </script>


@endsection
