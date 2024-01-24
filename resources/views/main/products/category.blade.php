@extends('shared.layout')
@section('Title', "home")
@section('content')
<section class="gray ">



    <div class="container">

        <div class="row justify-content-center">
            <div b-cti5zrxsij class="container">
                <nav b-cti5zrxsij id="navigation" class="navigation navigation-landscape mt-5">
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
                                            @foreach ($categories as $category)
                                            <option>{{ $category->Category }}</option>

                                            @endforeach
                                            
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
        </div>


        <div class="row">
            @if ($products->isEmpty())
        <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
            No products found for the given category.
          </div>
        </div>
      @else
      @foreach ($products as $product)
      <div class="col-lg-3 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
            <img src="{{ $product->Image }}" class="w-100" data-toggle="modal" data-target="#productModal{{ $product->id }}" />
            <a href="#!">
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body">
            <a href="{{ url('/product/' . $product->id) }}" class="text-reset" data-toggle="modal" data-target="#productModal{{ $product->id }}">
              <h5 class="card-title mb-3">{{ $product->Name }}</h5>
            </a>
            <p>{{ $product->category }}</p>
            <h6 class="mb-3">₦{{ $product->Price }}</h6>
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ url('/product/' . $product->id . '/buy') }}" class="btn btn-primary mr-2">Buy Now</a>
              <button class="btn btn-success" onclick="addToCart({{ $product->id }})">Add to Cart</button>
            </div>
          </div>
        </div>
      <!-- Product Modal -->
      <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->Name }} Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add specific details about the product here -->
              <p>{{ $product->category }}</p>
              <p>Product Description: {{ $product->Description }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- Add more modal buttons or actions here if needed -->
            </div>
          </div>
        </div>
      </div>
      </div>
    @endforeach
        
          @endif
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              {{ $products->links() }}
            </div>
          </div>


    </div>



</section>



<style>
    /* Add this CSS to your stylesheets or inline style tag in your Blade view */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination .page-item {
    margin: 0 5px;
    display: inline-block;
}

.pagination .page-link {
    color: #007bff;
    border: 1px solid #007bff;
    padding: 8px 12px;
    border-radius: 4px;
}

.pagination .page-link:hover {
    background-color: #007bff;
    color: #fff;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: not-allowed;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

    </style>
@endsection