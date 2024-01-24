@extends('shared.layout')
@section('Title', "Manage Restaurant")
@section('content')
<style>
    .tag-container {
        display: flex;
        flex-flow: row wrap;
    }

    .tag {
        pointer-events: none;
        background-color: #242424;
        color: white;
        padding: 6px;
        margin: 5px;
    }

        .tag::before {
            pointer-events: all;
            display: inline-block;
            content: 'x';
            height: 20px;
            width: 20px;
            margin-right: 6px;
            text-align: center;
            color: #ccc;
            background-color: #111;
            cursor: pointer;
        }

</style>

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">My Restaurants, Menu, and Dishes</h1>
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
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
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

        <div class="row">
            {{-- @if (!viewBagIsWebView)
            <div class="col-lg-2 col-md-2">
                <nav class="dashboard-nav mb-10 mb-md-0">
                    <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageInvoice') }}">My Order</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageAddresses') }}">Manage Address</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.likes') }}">Likes</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.editProfile') }}">Edit Profile</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.changePassword') }}">Change Password</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.activities') }}">Activity</a>
                        <a class="list-group-item list-group-item-action dropright-toggle active theme-bg text-white">
                            My Restaurants
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" data-toggle="modal" title="Sign Out" data-target="#logout" href="#">
                            Sign Out
                        </a>
                    </div>
                </nav>
            </div>
            @endif --}}

            <div class="col-lg-10 col-md-10">
                <!-- Total Items -->
                <div class="card style-2">
                    <div class="dashboard_wrap d-flex align-items-center justify-content-between">
                        <div class="arion">
                            <h4 class="mb-0">My Products</h4>
                            <p>Your dishes will be available on the following
                                {{-- <a href="{{ route('home.storeDistribution') }}" style="text-decoration: underline; color:#E10C2C;">stores</a>. --}}
                                <a href="#" style="text-decoration: underline; color:#E10C2C;">stores</a>.
                                    Edit your store info 
                                <a href="#" data-toggle="modal" data-target="#editRestaurantInfoModal"
                                    style="text-decoration: underline; color:#E10C2C;">
                                    here
                                </a>.
                            </p>
                        </div>
                        <div class="elkios">
                            <a href="#" class="add_new_btn" data-toggle="modal" data-target="#addRestaurantProductModal"><i
                                    class="fas fa-plus mr-1"></i>Add Product</a>
                        </div>
                    </div>
                </div>

                <div class="dashboard_wrap">
                    <div class="row">
                        <div class="table-responsive">
                            @if (!empty($model['Restaurants']))
                            @php $count = 0 @endphp

                            @foreach ($model['Restaurants'] as $data)
                            @php $count++ @endphp

                            <table class="table dash_list">
                                <thead>
                                    <tr>
                                        <th width="50px" scope="col">Image</th>
                                        <th scope="col">Dish</th>
                                        <th scope="col">Price(₦)</th>
                                        <th scope="col">About</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Online</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="smalls lg"><img src="{{ $data['ImagePath'] }}"
                                                    style="width:60px;"/></div></td>
                                        <td>{{ $data['DishName'] }}</td>
                                        <td>{{ $data['Price'] }}</td>
                                        <td>
                                            @if (strlen($data['AboutDish']) <= 18)
                                            {{ $data['AboutDish'] }}
                                            @else
                                            <div class="smalls lg">
                                                <details>
                                                    <summary>{{ substr($data['AboutDish'], 0, 18) }}</summary>
                                                    <p>{{ substr($data['AboutDish'], 18) }}</p>
                                                </details>
                                            </div>
                                            @endif
                                        </td>
                                        <th width="50px" scope="row">
                                            @if ($data['Status'] == "pending")
                                            <i style="color:orange" class="fas fa-clock" title="pending approval"></i>
                                            @elseif ($data['Status'] == "declined")
                                            <i style="color:red" class="fas fa-times" title="declined approval"></i>
                                            @else
                                            <i style="color: green" class="fas fa-check" title="Approved"></i>
                                            @endif
                                        </th>
                                        <td>
                                            @if ($data['IsOnline'] == "true")
                                            <i style="color:green" class="fas fa-check" title="Online"></i>
                                            @else
                                            <i style="color: red" class="fas fa-times" title="Offline"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="drp-select dropdown-menu">
                                                    @if ($data['IsOnline'] == "true")
                                                    <form action="{{ route('home.takeRestaurantProductOffline') }}" method="post">
                                                        @csrf
                                                        <input name="id" value="{{ $data['ID'] }}" required hidden />
                                                        <button type="submit" class="dropdown-item">Take Offline</button>
                                                    </form>
                                                    @else
                                                    <form action="{{ route('home.bringRestaurantProductOnline') }}" method="post">
                                                        @csrf
                                                        <input name="id" value="{{ $data['ID'] }}" required hidden />
                                                        <button type="submit" class="dropdown-item">Bring Online</button>
                                                    </form>
                                                    @endif
                                                    <form action="{{ route('home.deleteRestaurantProduct') }}" method="post">
                                                        @csrf
                                                        <input name="id" value="{{ $data['ID'] }}" required hidden />
                                                        <button type="submit" class="dropdown-item">Delete Product</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                            @else
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/img/NotFound.png') }}" style="width:20%"
                                            class="img-fluid" alt="" />
                                        <br /><br />
                                        <p>Nothing to see here, add more products to your restaurant.</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Restaurant Menu Modal -->
<div class="modal" id="addRestaurantMenuModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>

            <div class="modal-body">

                <div class="wrapper">
                    <h3>My Restaurant Menu</h3>
                    <p class="info">Enter a new your restaurant menu, press enter to add your menu to list. Click submit to save them.</p>
                    <input type="text" id="hashtags" maxlength="30" class="form-control" autocomplete="off">
                    <div class="tag-container">
                    </div>
                </div>

                <form class="forms_block">
                    <input id="resmenu" class="form-control" type="text" disabled hidden />
                    <div class="form-group smalls pt-5">
                        <a href="#" id="bulkMailSubmit" class="btn full-width theme-bg text-white">Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Menu Modal Ends -->

<!-- Edit Store Info Modal -->
<div class="modal" id="editRestaurantInfoModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit General Restaurant Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>

            <div class="modal-body">
                {{-- <form method="post" action="{{ route('home.editRestaurantInfo') }}" enctype="multipart/form-data"> --}}
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-2">
                            <img id="prodimg01" style="width:60px;" src="/storeBannerImagePath" />
                        </div>
                        <div class="col-10">
                            <label>Decorate Your Store (Upload a picture of this dish):</label>
                            <div class="custom-file">
                                <input type="file" multiple="false" class="custom-file-input" name="storebannerimagepath" id="fileupload01" onchange="onFileUpload01Change(this)" accept="image/png, image/gif, image/jpeg" required>
                                <label class="custom-file-label" for="fileupload01" id="fileupload01Label">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group smalls pt-5">
                        <label>Number Of Locations</label>
                        <select class="form-control" name="numberoflocations">
                            {{-- <option selected="{{ $ViewBag['numberOfLocations'] == '1' ? 'true' : 'false' }}">1</option>
                            <option selected="{{ $ViewBag['numberOfLocations'] == '2-5' ? 'true' : 'false' }}">2-5</option>
                            <option selected="{{ $ViewBag['numberOfLocations'] == '6-10' ? 'true' : 'false' }}">6-10</option>
                            <option selected="{{ $ViewBag['numberOfLocations'] == '11-25' ? 'true' : 'false' }}">11-25</option>
                            <option selected="{{ $ViewBag['numberOfLocations'] == '25+' ? 'true' : 'false' }}">25+</option> --}}
                        </select>
                    </div>

                    <div class="form-group smalls">
                        <label>First Name</label>
                        <input class="form-control" maxlength="20" value="" name="firstname" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Last Name</label>
                        <input class="form-control" maxlength="20" value="" name="lastname" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Email</label>
                        <input class="form-control" maxlength="50" value="" name="email" type="email" inputmode="email" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Phone Number</label>
                        <input class="form-control" maxlength="15" value="" name="phoneNumber" inputmode="numeric" type="text" required />
                    </div>

                    <div class "form-group smalls">
                        <label>Store Hours</label>
                        <input class="form-control" maxlength="50" value="" name="storehours" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Payment Methods</label>
                        <input class="form-control" maxlength="300" value="" name="paymentMethod" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Delivery Fee</label>
                        <input class="form-control" maxlength="11" value="" name="deliveryfee" type="number" inputmode="numeric" step=".01" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Business Name</label>
                        <input class="form-control" maxlength="11" value="" name="businessname" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Floor Suite</label>
                        <input class="form-control" maxlength="10" value="" name="floorsuite" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Store Name</label>
                        <input class="form-control" maxlength="30" value="" name="storename" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Business Type</label>
                        <select class="form-control" value="" name="businesstype">
                            <option>Restaurant</option>
                        </select>
                    </div>

                    <div class="form-group smalls">
                        <label>Cuisine Type</label>
                        <input class="form-control" maxlength="20" value="" name="cuisinetype" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Username</label>
                        <input class="form-control" maxlength="20" value="" name="username" type="text" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Password</label>
                        <input class="form-control" maxlength="20" value="" name="password" type="password" required />
                    </div>

                    <div class="form-group smalls">
                        <button type="submit" class="btn full-width theme-bg text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Product Modal Ends -->

<!-- Add Restaurant Product Modal -->
<div class="modal" id="addRestaurantProductModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                @using (Html.BeginForm("AddRestaurantProduct", "Home", FormMethod.Post, new { enctype = "multipart/form-data" }))
                {
                    <div class="row">
                        <div class="col-2">
                            <img id="prodimg" style="width:60px;" src="../../assets/img/DefaultProductImage.png"/>
                        </div>
                        <div class="col-10">
                            <label>Decorate Your Store (Upload a picture of this dish):</label>
                            <div class="custom-file">
                                <input type="file" multiple="false" class="custom-file-input" name="imagepath" id="fileupload" onchange="onFileUploadChange(this)" accept="image/png, image/gif, image/jpeg" required>
                                <label class="custom-file-label" for="fileupload" id="fileuploadLabel">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <input type="text" value="@ViewBag.restaurantId" name="restaurantid" hidden required />

                    <div class="form-group smalls pt-5">
                        <label>Dish Name</label>
                        <input class="form-control" maxlength="30" type="text" name="dishname" required />
                    </div>

                    <div class="form-group smalls">
                        <label>Price</label>
                        <input class="form-control" step=".01" maxlength="11" min="50" max="1000000" inputmode="numeric" name="price" type="number" required/>
                    </div>

                    <div class="form-group smalls">
                        <label>About Dish</label>
                        <textarea class="form-control" rows="4" maxlength="300" name="aboutdish" required></textarea>
                    </div>

                    <div class="form-group smalls">
                        <button type="submit" class="btn full-width theme-bg text-white">Submit</button>
                    </div>
                }
            </div>
        </div>
    </div>
</div>
<!-- Add Product Modal Ends -->


<script>
    function onFileUploadChange(imgurl) {
        if (imgurl.files && imgurl.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#prodimg').attr('src', e.target.result).width(60).height(60);
            };

            reader.readAsDataURL(imgurl.files[0]);
          }

        var fullPath = document.getElementById("fileupload").value;
        document.getElementById("fileuploadLabel").innerHTML = fullPath.replace(/^.*[\\\/]/, '');   
    }

    function onFileUpload01Change(imgurl) {
        if (imgurl.files && imgurl.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#prodimg01').attr('src', e.target.result).width(60).height(60);
            };

            reader.readAsDataURL(imgurl.files[0]);
          }

        var fullPath = document.getElementById("fileupload01").value;
        document.getElementById("fileupload01Label").innerHTML = fullPath.replace(/^.*[\\\/]/, '');   
    }

    let input, hashtagArray, container, t, menuList;

    input = document.querySelector('#hashtags');
    container = document.querySelector('.tag-container');
    hashtagArray = [];
    menuList = "";

    input.addEventListener('keyup', () => {
        if (event.which == 13 && input.value.length > 0) {
            var text = document.createTextNode(input.value);

            if (document.getElementById("resmenu").value === "") {
                document.getElementById("resmenu").value = text.data;
            }
            else {
                document.getElementById("resmenu").value = document.getElementById("resmenu").value + ", " + text.data;
            }

            var p = document.createElement('p');
            container.appendChild(p);
            p.appendChild(text);
            p.classList.add('tag');
            input.value = '';

            let deleteTags = document.querySelectorAll('.tag');

            for (let i = 0; i < deleteTags.length; i++) {
                deleteTags[i].addEventListener('click', () => {
                    container.removeChild(deleteTags[i]);
                });
            }
        }
    });
</script>
@endsection