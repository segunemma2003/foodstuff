@extends('shared.layout')
@section('Title', 'Shopping Lists')

<!-- resources/views/main/shopping_list -->
@section('content')
    <style>
        .loading {
            pointer-events: none;
            opacity: 0.5;
        }

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

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center">
                        <h1>Create Shopping List</h1>
                        <!-- Your search box and suggestions dropdown -->
                        <div class="form-group" style="display: block;">
                            <div class="smalls input-with-icon">
                                <input spellcheck="true" autocomplete="on" type="text"
                                    name="item" value="{{ $item ?? '' }}" max="100" maxlength="100"
                                    placeholder="Search For Food Items" class="form-control" style="height:54px"
                                    oninput="handleSearchInput(event)" required>
                                <i class="ti-search"></i>
                            </div>
                            <div style="display: block;">
                                <div id="suggestionsDropdown" class="suggestions-dropdown d-flex align-items-center flex-wrap gap-2 justify-content-between">
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
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1>My Shopping Lists</h1>
                                    <br>
                                    <span>Total cost: ₦{{$shoppingLists->sum(function ($item) {
                                        return $item->price * $item->quantity;
                                    })}}</span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Price and Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shoppingLists as $product)
                                                <tr>
                                                    <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image"
                                                            style="width: 100px; height: 100px;"></td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>
                                                        <form action="{{ route('shopping-list.update', ['id' => $product->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="row justify-content-center" style="margin: 5px;">
                                                                <input style="width: 60px; margin-right: 4px" type="number" name="price" value="{{ $product->price }}" min="1">
                                                                <input style="width: 60px" type="number" name="quantity" value="{{ $product->quantity }}" min="1">
                                                            </div>
                                                            <button style="width: 100%" type="submit">Update</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('shopping-list.delete', ['id' => $product->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure to remove from list?')">Remove from
                                                                List</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <form action="{{ route('submit.shopping.list') }}" method="post">
                                            @csrf
                                            <button type="submit" class="submit-button">Submit Shopping List</button>
                                        </form>
                                    </div>
                                </div>
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

            // Generate HTML for dropdown suggestions
            if (filteredProducts.length > 0) {
                filteredProducts.forEach(product => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.classList.add('suggestion-item', 'card', 'm-2', 'cursor-pointer');
                    suggestionItem.style.backgroundColor = '#fffffe';
                    suggestionItem.style.borderRadius = '10px';
                    suggestionItem.innerHTML = `
                        <img style="height: 100px; width: auto;" src="${product.Image}" alt="${product.Name}">
                        <div class="card-body px-3 py-2 d-flex flex-column justify-content-between" >
                            <h4>${product.Name}</h4>
                            <p>${product.Price}</p>
                            <p style="cursor: pointer">Add To List <i class="fas fa-shopping-basket"></i></p>
                        </div>
                    `;
                    suggestionItem.addEventListener('click', () => {
                        // Handle click event to add selected product to list via AJAX
                        addProductToList(product);
                    });
                    suggestionsDropdown.appendChild(suggestionItem);
                });
            } else {
                // If no matches found, display "Nothing found" message
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
                    "foodstuff": product.ID // Assuming product id is used to identify the product
                },
                success: function(response) {
                    console.log(response); // Log success response
                    // Optionally, display a success message to the user
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
