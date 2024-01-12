@extends('shared.layout')
@section('Title', "Store")
@section('content')

<!-- ============================ Store Items ================================== -->
<section class="gray mt-5">

    <div class="container">
        <div class="row justify-content-center">
            @if ($foodStuffs != null)
                @php $i = 0; @endphp
                @foreach ($foodStuffs as $data)
                    @php $i++; @endphp
                      
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="#" data-toggle="modal" data-target="#desc_{{ $data->id }}" class="crs_detail_link">
                                    <img src="{{ $data->Image }}" class="img-fluid rounded" style="background-color: #F7F8F9;" alt="{{ $data->Name }}" />
                                </a>
                              
                                
                                <div class="crs_video_ico">
                                    @if (!empty($uuid))
                                        <button type="button" onclick="SubmitLikeForm('{{ $data->ProductID }}')" style="background-color:transparent; border:none;">
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
                                <a href="#" data-toggle="modal" data-target="#desc_266" class="crs_title_link">
                                
                                    {{$data->Name}}
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
                                                <span style="margin-left: 0px; padding-left:0px" class="theme-cl">{{$data->Price}}</span>
                                             </h4>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                           </div>

                          </div>
                     {{-- new section ends --}}
                {{-- button section starts --}}
                   <div class="preview_crs_info">
                    <input name="" value="{{$data->ID}}" hidden />
                    <button type="button" onclick="AddToCart('{{$data->ID}}', '{{$data->ProductID}}')" 
                    id="cartButtonTexta-{{$data->ID}}" class="btn btn-md full-width theme-bg text-white " fdprocessedid ="ffwzg"
                    >
                    <i class="fas fa-shopping-basket"></i>
                   </button>
                   </div>
                {{-- button section ends --}}
                        </div>
                    </div>

                    <div class="modal fade" id="desc_{{ $data->ID }}" tabindex="-1" role="dialog" aria-labelledby="loginoutmodal" aria-hidden="true">

                    </div>
                @endforeach
            @else
            @endif
        </div>

        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <p class="p-0">

                </p>
            </div>
        </div>

        <div class="row align-items-center justify-content-between">
               {{--  <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            @if ($foodStuffListItemsLength > 19)
                                <li class="page-item">
                                    <a href="#" onclick="navToNextStorePage()" class="page-link">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a href="#" class="page-link">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>  
{{ $foodStuffs->links() }}
            @if ($currentPage == 1)
                {{--  <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            @if ($foodStuffListItemsLength > 19)
                                <li class="page-item">
                                    <a href="#" onclick="navToNextStorePage()" class="page-link">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a href="#" class="page-link">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>  --}}
            {{-- @elseif ($currentPage != 1 && $foodStuffListItemsLength < 20) --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item">
                                <a class="page-link" onclick="navToPrevStorePage()" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    {{-- {{ $currentPage }} --}}
                                </a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item">
                                <a class="page-link" onclick="navToPrevStorePage()" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    {{-- {{ $currentPage }} --}}
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" onclick="navToNextStorePage()" href="#">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
    </div>

    <div class="row align-items-center justify-content-between mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12">

            <button type="submit" style="color:#E10C2C; background-color:transparent; border:none;"><span> ← </span>Back
                To Home </button>

            </div>
    </div>
    </div>
</section>

<!-- ============================ Store Ends ================================== -->
<!-- End of Confirm Sign Out Modal -->


<script>
    function SubmitCartForm(prodID) {
    document.getElementById("productid").value = prodID;

        $.ajax({
            url: 'https://foodstuffstore.net/FoodStuffStore.php',
            type: 'POST',
            data: $('#addToCartForm').serialize(),
            error: function (xhr, status, error) {

            },
            success: function (response) {

            }
        });
        document.getElementById("alertSnackBar").value = "🛍️  Item added to cart";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);

        $('#cartItemCount').val(function (i, oldval) {
            return ++oldval;
        });

    }

    @*Like An Item Script*@

    function SubmitLikeForm(prodID) {
        document.getElementById("productid2").value = prodID;
        $.ajax({
            url: 'https://foodstuffstore.net/FoodStuffStore.php',
            type: 'POST',
            data: $('#likeAnItemForm').serialize(),
            error: function (xhr, status, error) {

            },
            success: function (response) {

            }
        });
        document.getElementById("alertSnackBar").value = "You ❤️ an item";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);

    }



    int width = (Request.Browser.ScreenPixelsWidth) * 2 - 100;
    int height = (Request.Browser.ScreenPixelsHeight) * 2 - 100;


    @*Set data on description dialog*@

    function setDescription(img, name) {
        document.getElementById("descImage").src = img;
        document.getElementById('descNameLabel').innerHTML = name;
    }


    @*Navigate to next page*@

    function navToNextStorePage() {
        document.getElementById("gotoNextPageForm").submit();
    }

    function navToPrevStorePage() {
        document.getElementById("gotoPrevPageForm").submit();
    }
</script>

<!-- ============================ Store Items ================================== -->
<section class="gray mt-5">

    <div class="container">
        <div class="row justify-content-center">
            @if ($foodStuffs != null)
                @php $i = 0; @endphp
                @foreach ($foodStuffs as $data)
                    @php $i++; @endphp

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="#" data-toggle="modal" data-target="#desc_{{ $data->id }}" class="crs_detail_link">
                                    <img src="{{ $data->Image }}" class="img-fluid rounded" style="background-color: #F7F8F9;" alt="{{ $data->Name }}" />
                                </a>
                                <div class="crs_video_ico">
                                    @if (!empty($uuid))
                                        <button type="button" onclick="SubmitLikeForm('{{ $data->ProductID }}')" style="background-color:transparent; border:none;">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#login">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="modal fade" id="desc_{{ $data->ID }}" tabindex="-1" role="dialog" aria-labelledby="loginoutmodal" aria-hidden="true">

                    </div>
                @endforeach
            @else
            @endif
        </div>

        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <p class="p-0">

                </p>
            </div>
        </div>

        <div class="row align-items-center justify-content-between">

            {{-- @if ($currentPage == 1) --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            @if ($foodStuffListItemsLength > 19)
                                <li class="page-item">
                                    <a href="#" onclick="navToNextStorePage()" class="page-link">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a href="#" class="page-link">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            {{-- @elseif ($currentPage != 1 && $foodStuffListItemsLength < 20) --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item">
                                <a class="page-link" onclick="navToPrevStorePage()" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    {{-- {{ $currentPage }} --}}
                                </a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        <ul class="pagination smalls m-0">
                            <li class="page-item">
                                <a class="page-link" onclick="navToPrevStorePage()" href="#" tabindex="-1">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    {{-- {{ $currentPage }} --}}
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" onclick="navToNextStorePage()" href="#">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
    </div>

    <div class="row align-items-center justify-content-between mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12">

            <button type="submit" style="color:#E10C2C; background-color:transparent; border:none;"><span> ← </span>Back
                To Home</button>

            </div>
    </div>
    </div>
</section>

<!-- ============================ Store Ends ================================== -->
<!-- End of Confirm Sign Out Modal -->


<script>
    function SubmitCartForm(prodID) {
    document.getElementById("productid").value = prodID;

        $.ajax({
            url: 'https://foodstuffstore.net/FoodStuffStore.php',
            type: 'POST',
            data: $('#addToCartForm').serialize(),
            error: function (xhr, status, error) {

            },
            success: function (response) {

            }
        });
        document.getElementById("alertSnackBar").value = "🛍️  Item added to cart";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);

        $('#cartItemCount').val(function (i, oldval) {
            return ++oldval;
        });

    }

    @*Like An Item Script*@

    function SubmitLikeForm(prodID) {
        document.getElementById("productid2").value = prodID;
        $.ajax({
            url: 'https://foodstuffstore.net/FoodStuffStore.php',
            type: 'POST',
            data: $('#likeAnItemForm').serialize(),
            error: function (xhr, status, error) {

            },
            success: function (response) {

            }
        });
        document.getElementById("alertSnackBar").value = "You ❤️ an item";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);

    }



    int width = (Request.Browser.ScreenPixelsWidth) * 2 - 100;
    int height = (Request.Browser.ScreenPixelsHeight) * 2 - 100;


    @*Set data on description dialog*@

    function setDescription(img, name) {
        document.getElementById("descImage").src = img;
        document.getElementById('descNameLabel').innerHTML = name;
    }


    @*Navigate to next page*@

    function navToNextStorePage() {
        document.getElementById("gotoNextPageForm").submit();
    }

    function navToPrevStorePage() {
        document.getElementById("gotoPrevPageForm").submit();
    }
</script>

@endsection
