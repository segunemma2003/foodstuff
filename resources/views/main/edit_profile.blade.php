@extends('shared.layout')
@section('Title', "Edit Profile")
@section('content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="breadcrumbs-wrap">
					<h1 class="breadcrumb-title">Edit Profile</h1>
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
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Edit Profile Starts ============================= -->
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

        <div class="row">
            <div class="col-lg-2 col-md-2">
                <nav class="dashboard-nav mb-10 mb-md-0">
                    <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageInvoice') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            My Order
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageAddresses') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Manage Address
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.likes') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Likes
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle active theme-bg text-white" href="#">
                            Edit Profile
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.changePassword') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Change Password
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.activities') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Activity
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageRestaurants') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            My Restaurants
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" data-toggle="modal" title="Sign Out" data-target="#logout" href="#">
                            Sign Out
                        </a>
                    </div>
                </nav>
            </div>

            <div class="col-lg-10 col-md-10">
                <div class="card style-2">
                    <div class="card-header">
                        <h4 class="mb-0">Account Detail</h4>
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('home.editProfile') }}" method="POST" class="submit-page"> --}}
                        <form action="" method="POST" class="submit-page">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Username *</label>
                                        <input class="form-control" type="text" name="Username" placeholder="Username" value="" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input class="form-control" type="text" name="PhoneNumber" placeholder="Phone Number" value="" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email Address *</label>
                                        <input class="form-control" type="email" placeholder="Email address" value="" disabled required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ Edit Profile Ends =============================== -->

@endsection