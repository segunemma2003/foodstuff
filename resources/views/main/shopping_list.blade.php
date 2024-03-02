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
                                <input spellcheck="true" autocomplete="on" type="text" name="item"
                                    value="{{ $item ?? '' }}" max="100" maxlength="100"
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
                    <div id="shopping_list_contents">
                        {{-- shoppinglist content --}}
                    </div>
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
                    // Refresh the list
                    getShoppingListsData()
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error response
                    if (xhr.status === 401) {
                        // Handle unauthorized error (user not logged in)
                        alert('You are not logged in. Please log in to add items to your Shopping List.');
                        // redirect to signin page
                        window.location.href = '/home/signin';
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

        // document.addEventListener('DOMContentLoaded', loadShoppingList({!! json_encode($shoppingLists) !!}));
        document.addEventListener('DOMContentLoaded', getShoppingListsData());

        function loadShoppingList(shoppingLists) {
            const shoppingListContents = document.getElementById('shopping_list_contents');

            if (shoppingLists.length === 0) {
                shoppingListContents.innerHTML = `
                    <div class="text-center col-lg-6 mx-auto">
                        <img src="${window.location.origin}/assets/img/EmptyCart.png" style="width:50%;" class="img-fluid" alt="" />
                        <br /><br />
                        <h4>Your list is empty! Start adding to list by using the search box.</h4>
                        <br />
                        <a href="${window.location.origin}/home/store" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                    </div>
                `;
            } else {
                let html = `
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
                `;

                shoppingLists.forEach(product => {
                    html += `
                        <tr>
                            <td><img src="${product.image}" alt="${product.name}" class="product-image" style="max-width: 100px; max-height: 100px;"></td>
                            <td>${product.name}</td>
                            <td>
                                <div class="input-group">
                                    <input id="price_${product.id}" style="width: 100px" type="number" class="form-control" name="price" value="${product.price}" min="1">
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input id="quantity_${product.id}" type="number" class="form-control" name="quantity" value="${product.quantity}" min="1">
                                </div>
                            </td>
                            <td>
                                ₦${product.quantity * product.price}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary mt-2" onclick="updateShoppingList(${product.id})">Update</button>
                            </td>
                            <td>
                                <form action="/shopping-list/delete/${product.id}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to remove from list?')">Remove <i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    `;
                });

                html += `
                    </tbody>
                    </table>
                    </div>
                
                        <div class="summary_table">
                            <ul>
                                <li style="border-bottom: 1px solid #333; padding: 5px;">
                                    <h6>You have ${shoppingLists.length} items in your list</h6>
                                </li>
                                <li style="border-bottom: 1px solid #333; padding: 5px;">
                                    <h6>Tax: <span>5%</span></h6>
                                </li>
                                <li style="border-bottom: 1px solid #333; padding: 5px;">
                                    <h6>Sub Total
                                        <span>: ₦${shoppingLists.reduce((total, item) => total + (item.price * item.quantity), 0)}</span>
                                    </h6>
                                </li>
                                <li style="padding: 5px;">
                                    <h6>Total: <span>
                                        ₦ ${shoppingLists.reduce((total, item) => total + (item.price * item.quantity), 0) * 1.05}</span></h6>
                                </li>                                                
                                <li style="padding: 5px;">
                                    <form action="${window.location.origin}/submit.shopping.list" method="post">
                                        <button type="submit" style="width: 100%" class="btn btn-success">Submit Shopping List</button>
                                    </form>
                                </li>                                          
                                <li style="padding: 5px;">
                                    <form action="${window.location.origin}/shopping-list/clear" method="POST">
                                        <button type="submit" style="width: 100%" class="btn btn-danger" onclick="return confirm('Are you sure to clear all list?')">Clear Shopping List</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>                                        
                `;

                shoppingListContents.innerHTML = html;
            }
        };

        function getShoppingListsData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/shopping_lists_data', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var responseData = JSON.parse(xhr.responseText);
                        loadShoppingList(responseData.shoppingLists);
                    } else {
                        console.error('Error fetching shopping lists data:', xhr.status);
                    }
                }
            };
            xhr.send();
        }

        function updateShoppingList(productId) {
            document.body.classList.add('loading');

            // Retrieve the updated price and quantity values
            var updatedPrice = document.getElementById('price_' + productId).value;
            var updatedQuantity = document.getElementById('quantity_' + productId).value;

            // Construct the form data
            var formData = new FormData();
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            formData.append('price', updatedPrice);
            formData.append('quantity', updatedQuantity);

            // Send the AJAX request to update the shopping list
            var xhr = new XMLHttpRequest();
            xhr.open('POST', `/shopping-list/update/${productId}`, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle success
                        console.log('Shopping list updated successfully!');
                        // Load the shopping list after successful update
                        setTimeout(() => {
                            document.body.classList.remove('loading');
                            getShoppingListsData();
                        }, 500);
                    } else {
                        // Handle error
                        alert('Error updating shopping list:', xhr.status);
                        document.body.classList.remove('loading');
                    }
                }
            };
            xhr.send(formData);
        }
    </script>

@endsection
