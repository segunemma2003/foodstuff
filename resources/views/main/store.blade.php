@extends('shared.layout')
@section('Title', "Store")
@section('content')

<!-- ============================ Store Items ================================== -->
<section class="gray mt-5">
    <div b-cti5zrxsij class="container">
        <nav b-cti5zrxsij id="navigation" class="navigation navigation-landscape">
            <form action="/SearchFoodStuff" method="POST">
            <div b-cti5zrxsij  class="row align-items-end">
                <div b-cti5zrxsij  class="col-xl-9 col-lg-9 col-md-6 col-sm-11">
                  <div b-cti5zrxsij class="form-group">
                    <div b-cti5zrxsij class="smalls input-with-icon">
                        <input b-cti5zrxsij spellcheck="true" autocomplete="on" type="text" name="keyboard" max="100"  maxlength="100" placeholder="Search For Food Items" class="form-control" style="height:54px" required>
                        <i class="ti-search"></i>
                        <input b-cti5zrxsij name="offset" value="0" hidden>
                        <input b-cti5zrxsij name="limit" value="20" hidden>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-11 ">
                    <div b-cti5zrxsij class="form-group ">
                        <div  class="input-group">
                          <div class="col-12">
                            <select  name="category" class="form-control  select2-hidden-accesible " style="width:100% !important" id="cates" data-select2-id="cates" tabindex="-1" aria-hidden="true">
                                <option value="all" selected data-selected2-id="2">
                                    All Category
                                </option>
                                <option value="Vegetable">
                                    Vegetable
                                </option>
                                <option value="Protein" >
                                   Protein
                                </option>
                                <option value="Seasoning" >
                                    Seasoning
                                 </option>
                                 <option value="Fruits" >
                                    Fruits
                                 </option>
                                 <option value="Grains" >
                                    Grains
                                 </option>
                                 <option value="Nuts" >
                                    Nuts
                                 </option>
                                 <option value="Processed" >
                                    Processed
                                 </option>
                                 <option value="Fuids" >
                                    Fluids
                                 </option>
                                 <option value="Live stock" >
                                    Livestock
                                 </option>
                                 <option value="Seeds" >
                                    Seeds
                                 </option>
                                </select>
                          </div>
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100% !important">
                            </span>
                            
                            </span>
                            <div  class="input-group-append">
                                <button type="submit" class="input-group-text theme-bg b-0 text-light" style="border:none; width:54px; height:54px" >
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

            {{-- @elseif ($currentPage != 1 && $foodStuffListItemsLength < 20) --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav>
                        {{ $foodStuffs->links() }}
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
</script>


@endsection
