@extends('shared.layout')
@section('Title', 'Shopping Lists')

<!-- resources/views/main/shopping_list -->
@section('content')
    <style>
        .shopping-list-wrapper {
            display: flex;
            flex-direction: column;
            padding: 15px;
        }

        .shopping-list-container {
            max-width: 100vw;
            overflow: auto;
            margin: auto;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 8px 15px;
            background: #fff;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        @media screen and (max-width: 768px) {
            .product-item {
                gap: 10px;
                padding: 8px 10px;
                background: #fff;
                margin-bottom: 10px;
                border-radius: 8px;
                flex-direction: column;
            }
        }

        .submit-button {
            background-color: #E22D2C;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #9b0a0a;
        }

        .remove-button {
            background-color: #ccc;
            color: #333;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .remove-button:hover {
            background-color: #999;
        }
    </style>

    <!-- ============================ Store Items ================================== -->
    <section class="gray mt-5">

        <div class="container">
            <h1>Create Shopping List</h1>

            <div class="row justify-content-center">
                <div b-cti5zrxsij class="container">
                    <nav b-cti5zrxsij id="navigation" class="navigation navigation-landscape">
                        <form action="{{ route('getShoppingLists') }}" method="GET">
                            <div b-cti5zrxsij class="row align-items-end">
                                <div b-cti5zrxsij class="col-md-12">
                                    <div b-cti5zrxsij class="form-group" style="display: flex; align-items: center">
                                        <div b-cti5zrxsij class="smalls input-with-icon">
                                            <input b-cti5zrxsij spellcheck="true" autocomplete="on" type="text"
                                                name="item" value="{{ $item ?? '' }}" max="100" maxlength="100"
                                                placeholder="Search For Food Items" class="form-control" style="height:54px"
                                                required>
                                            <i class="ti-search"></i>
                                        </div>
                                        <div class="input-group-append" style="cursor: pointer">
                                            <button type="submit" class="input-group-text theme-bg b-0 text-light"
                                                style="cursor: pointer; border:none; width:54px; height:54px">
                                                <span style="cursor: pointer" class="ti-search"></span>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </nav>

                </div>
                @if ($foodStuffs != null)
                    @foreach ($foodStuffs as $data)
                        <form action="{{ route('saveShoppingLists', ['foodstuff' => $data->ID]) }}" method="POST"
                            class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 px-3">
                            @csrf
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
                                    <button type="submit" id="cartButtonTexta-{{ $data->ID }}"
                                        class="btn btn-md full-width theme-bg text-white " fdprocessedid ="ffwzg">
                                        Add To List
                                        <i class="fas fa-shopping-basket"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @endif
                @if ($foodStuffs->count() == 0)
                    <div class="row justify-content-center">
                        <div></div>
                        <div class="col-lg-6 col-md-10">
                            <div class="text-center">

                                <img src="{{ asset('assets/img/EmptyActivity.png') }}" style="width:50%;" class="img-fluid"
                                    alt="" />
                                <br /><br />
                                <p>
                                    We found nothing!
                                </p>

                            </div>
                        </div>

                    </div>
                @endif

                @if ($shoppingLists->count() !== 0)
                    <div class="shopping-list-wrapper">
                        <h1 class="shopping-list-title">My Shopping Lists</h1>
                        <h3 class="shopping-list-title">Total = ₦{{ $shoppingLists->sum(function($item) {
                            return $item->quantity * $item->price;
                        }) }}</h3>                        
                        <div class="shopping-list-container">
                            @foreach ($shoppingLists as $product)
                                @if (!empty($product))
                                    <div class="product-item">
                                        <div style="display: flex; align-items: center;">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                class="product-image"
                                                style="width: 200px; height: 200px; margin-right: 10px;">
                                            <div>
                                                <h3>{{ $product->name }}</h3>
                                                <p>Price: ₦{{ $product->price }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('shopping-list.update', ['id' => $product->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div style="display: flex; flex-direction: column">
                                                <label for="quantity_{{ $loop->index }}">Quantity:</label>
                                                <input type="number" name="quantity" id="quantity_{{ $loop->index }}"
                                                    value="{{ $product->quantity }}" min="1">
                                                <button type="submit" class="remove-button">Update</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('shopping-list.delete', ['id' => $product->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove-button" onclick="return confirm('Are you sure to remove from list?')">Remove from List</button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <form action="{{ route('submit.shopping.list') }}" method="post">
                            @csrf
                            <button type="submit" class="submit-button">Submit Shopping List</button>
                        </form>
                    </div>
                @endif

            </div>

        </div>

    </section>

@endsection
