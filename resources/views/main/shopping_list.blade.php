@extends('shared.layout')
@section('Title', 'Shopping Lists')

<!-- resources/views/main/shopping_list -->
@section('content')
    <style>
        .loading {
            pointer-events: none;
            opacity: 0.5;
        }
        .suggestions-dropdown {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .suggestion-item {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 2px 5px;
            margin: 0%;
        }

        .suggestion-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .suggestion-item img {
            height: 40px;
            width: auto;
        }

        .div_container {
            display: flex;
        }
        
        .main_table {
            width: 80%;
            overflow: auto;
        }

        .summary_table {
            padding: 15px;
            background: #ffffff;
            width: 20%;
            height: fit-content;
        }

        @media screen and (max-width: 768px) {
            .div_container {
                display: flex;
                flex-direction: column;
            }
            
            .main_table {
                width: 100%;
            }

            .summary_table {
                width: 100%;
            }

            .suggestion-row {
                padding: 2px;
                font-size: 10px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .suggestion-row img {
                height: 20px;
                width: auto;
            }

            .product_name {
                font-size: 12px;
                white-space: nowrap;
            }
        }
    </style>

    <!-- ============================ Store Items ================================== -->
    <section class="gray mt-5">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <h1>Create Shopping List</h1>
                        <!-- search box and suggestions dropdown -->
                        <div class="form-group">
                            <div class="smalls input-with-icon">
                                <input spellcheck="true" autocomplete="on" type="text"
                                    name="item" value="{{ $item ?? '' }}" max="100" maxlength="100"
                                    placeholder="Search For Food Items" class="form-control" style="height:54px"
                                    oninput="handleSearchInput(event)" required />
                                <i class="ti-search"></i>
                            </div>
                            <div style="display: block;">
                                <div id="suggestionsDropdown" class="suggestions-dropdown col-md-8">
                                    <!-- Suggestions will be dynamically generated here -->
                                </div>                                
                            </div>
                        </div>
                        <!-- End of search box and suggestions dropdown -->
                    </div>
                    @if ($shoppingLists->isEmpty())
                        <div class="text-center col-lg-6 mx-auto">
                            <img src="{{ asset('assets/img/EmptyCart.png') }}" style="width:50%;" class="img-fluid" alt="" />
                            <br /><br />
                            <h4>Your list is empty! Start adding to list by using the search box.</h4>
                            <br />
                            <a href="{{ route('home.store') }}" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                        </div>
                    @else
                        <h1>My Shopping List</h1>
                        <div class="row col-lg-12 div_container">
                            <div class="table responsive main_table">
                                <table class="table table-bordered col-sm-12">
                                    <thead>
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shoppingLists as $product)
                                        <tr>
                                            <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image" style="max-width: 100px; max-height: 100px;"></td>
                                            <td>{{ $product->name }}</td>
                                            <form action="{{ route('shopping-list.update', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <td>
                                                    <div class="input-group">
                                                        <input style="width: 100px" type="number" class="form-control" name="price" value="{{ $product->price }}" min="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" min="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    ₦{{ $product->quantity * $product->price }}
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                                </td>
                                            </form>
                                            <td>
                                                <form action="{{ route('shopping-list.delete', ['id' => $product->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to remove from list?')">Remove <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="summary_table">
                                <ul>
                                    <li style="border-bottom: 1px solid #333; padding: 5px;">
                                        <h6>You have {{ $shoppingLists->count() }} items in your list</h6>
                                    </li>
                                    <li style="border-bottom: 1px solid #333; padding: 5px;">
                                        <h6>Tax: <span>5%</span></h6>
                                    </li>
                                    <li style="border-bottom: 1px solid #333; padding: 5px;">
                                        <h6>Sub Total
                                            <span>: ₦{{ $subTotal = $shoppingLists->sum(function ($item) {
                                                    return $item->price * $item->quantity;
                                                }) }}</span>
                                        </h6>
                                    </li>
                                    <li style="padding: 5px;">
                                        <h6>Total: <span>
                                            ₦ {{ number_format($total = $subTotal + ($subTotal * 0.05), 2) }}
                                        </span></h6>
                                    </li>                                                
                                    <li style="padding: 5px;">
                                        <form action="{{ route('submit.shopping.list') }}" method="post">
                                            @csrf
                                            <button type="submit" style="width: 100%" class="btn btn-success">Submit Shopping List</button>
                                        </form>
                                    </li>                                          
                                    <li style="padding: 5px;">
                                        <form action="{{ route('shopping-list.clear') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="width: 100%" class="btn btn-danger" onclick="return confirm('Are you sure to clear all list?')">Clear Shopping List</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>                                        
                    @endif
                </div>
            </div>            
        </div>

    </section>

    <script>
        // Function to handle search input
        function handleSearchInput(event) {
            const inputValue = event.target.value ? event.target.value.toLowerCase() : '';
            const filteredProducts = {!! json_encode($foodstuffs) !!}.filter(product => {
                // Filter products based on input value
                return product.Name.toLowerCase().includes(inputValue);
            });

            const suggestionsDropdown = document.getElementById('suggestionsDropdown');
            suggestionsDropdown.innerHTML = ''; // Clear previous suggestions

            // Generate HTML for dropdown suggestions, limited to maximum 15 items
            for (let i = 0; i < Math.min(filteredProducts.length, 15); i++) {
                const product = filteredProducts[i];
                const suggestionItem = document.createElement('div');
                suggestionItem.classList.add('suggestion-item', 'card');
                suggestionItem.innerHTML = `
                    <div class="suggestion-row" style="cursor: pointer; margin: 0; display:flex; align-items: center;">
                        <div class="col-md-7" style="display:flex; align-items: center;">
                            <img src="${product.Image}" alt="${product.Name}" class="img-fluid">
                            <p class="product_name">${product.Name}</p>
                        </div>
                        <div class="col-md-3">
                            <p>${product.Price}</p>
                        </div>
                    </div>
                `;
                suggestionItem.addEventListener('click', () => {
                    // Handle click event to add selected product to list via AJAX
                    addProductToList(product);
                });
                suggestionsDropdown.appendChild(suggestionItem);
            }

            // If no matches found, display "Nothing found" message
            if (filteredProducts.length === 0) {
                const nothingFoundMessage = document.createElement('div');
                nothingFoundMessage.classList.add('text-muted', 'p-2');
                nothingFoundMessage.textContent = 'Nothing found';
                suggestionsDropdown.appendChild(nothingFoundMessage);
            }
        }

        // Function to add selected product to list via AJAX
        function addProductToList(product) {
            // Disable the page
            $('body').addClass('loading');

            $.ajax({
                url: "{{ route('saveShoppingLists') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "foodstuff": product.ID
                },
                success: function(response) {
                    alert('Item has been added to your Shopping List!');
                    // Refresh the page
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error response
                    if (xhr.status === 401) {
                        // Handle unauthorized error (user not logged in)
                        alert('You are not logged in. Please log in to add items to your Shopping List.');
                    } else {
                        // Handle other errors
                        const response = JSON.parse(xhr.responseText);
                        alert(response.error);
                    }
                },
                complete: function() {
                    // Enable the page
                    $('body').removeClass('loading');
                }
            });
        }
    </script>
    
@endsection
