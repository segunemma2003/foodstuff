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

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">
                        <h1>Create Shopping List</h1>
                        <!-- Your search box and suggestions dropdown -->
                        <div class="form-group" style="display: flex; align-items: center">
                            <div class="smalls input-with-icon">
                                <input spellcheck="true" autocomplete="on" type="text"
                                    name="item" value="{{ $item ?? '' }}" max="100" maxlength="100"
                                    placeholder="Search For Food Items" class="form-control" style="height:54px"
                                    oninput="handleSearchInput(event)" required>
                                <i class="ti-search"></i>
                            </div>
                            <div id="suggestionsDropdown" class="suggestions-dropdown">
                                <!-- Suggestions will be dynamically generated here -->
                            </div>
                        </div>
                        <!-- End of search box and suggestions dropdown -->
                    </div>
                    @if ($shoppingLists->isEmpty())
                    <div class="text-center">
                        <img src="{{ asset('assets/img/EmptyCart.png') }}" style="width:50%;" class="img-fluid" alt="" />
                        <br /><br />
                        <h4>Your list is empty! Start adding to list by using the search box.</h4>
                        <br />
                        <a href="{{ route('home.store') }}" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
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
                return product.name.toLowerCase().includes(inputValue);
            });

            const suggestionsDropdown = document.getElementById('suggestionsDropdown');
            suggestionsDropdown.innerHTML = ''; // Clear previous suggestions

            // Generate HTML for dropdown suggestions
            filteredProducts.forEach(product => {
                const suggestionItem = document.createElement('div');
                suggestionItem.classList.add('suggestion-item');
                suggestionItem.innerHTML = `
                    <img style="height: 50px; width: 50px;" src="${product.image}" alt="${product.name}">
                    <div class="product-info">
                        <h4>${product.name}</h4>
                        <p>${product.price}</p>
                    </div>
                `;
                suggestionItem.addEventListener('click', () => {
                    // Handle click event to add selected product to list via AJAX
                    addProductToList(product);
                });
                suggestionsDropdown.appendChild(suggestionItem);
            });
        }

        // Function to add selected product to list via AJAX
        function addProductToList(product) {
            $.ajax({
                url: "{{ route('saveShoppingLists') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "foodstuff": product.id // Assuming product id is used to identify the product
                },
                success: function(response) {
                    console.log(response); // Log success response
                    // Optionally, display a success message to the user
                    alert('Item has been added to your Shopping List!');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error response
                    // Optionally, display an error message to the user
                    alert('An error occurred while adding the item to your Shopping List.');
                }
            });
        }
    </script>
    
@endsection
