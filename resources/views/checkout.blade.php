<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Komparas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col">
@include('components.navbar')
    <div class="container mx-auto mt-8 ">
        <div class="bg-white p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-2 mt-7">Checkout</h2>
            <div class="mb-4">
                <h3 class="text-lg font-medium mb-2">Customer Information</h3>
                <form>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-600">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="mt-1 p-2 w-full border rounded-md text-sm">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="mt-1 p-2 w-full border rounded-md text-sm">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md text-sm">
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="mb-4">
                <h3 class="text-lg font-medium mb-2">Order Summary</h3>
                <ul class="divide-y divide-gray-200">
                    <!-- Sample Product -->
                    <li class="flex justify-between items-center py-2">
                        <div class="flex items-center space-x-2">
                            <img src="https://placekitten.com/32/32" alt="Product" class="w-6 h-6 rounded-md">
                            <span class="font-medium text-sm">Product Name</span>
                        </div>
                        <span class="text-gray-700 text-sm">$19.99</span>
                    </li>

                    <!-- Total -->
                    <li class="flex justify-between items-center py-2">
                        <span class="font-medium text-sm">Total</span>
                        <span class="text-blue-700 font-semibold text-sm">$19.99</span>
                    </li>
                </ul>
            </div>

            <!-- Shipping Information -->
            <div class="mb-4">
                <h3 class="text-lg font-medium mb-2">Shipping Information</h3>
                <form>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-600">Address</label>
                            <input type="text" id="address" name="address"
                                class="mt-1 p-2 w-full border rounded-md text-sm">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-600">City</label>
                            <input type="text" id="city" name="city" class="mt-1 p-2 w-full border rounded-md text-sm">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="zipcode" class="block text-sm font-medium text-gray-600">Zip Code</label>
                        <input type="text" id="zipcode" name="zipcode"
                            class="mt-1 p-2 w-full border rounded-md text-sm">
                    </div>
                </form>
            </div>

            <!-- Payment Information -->
            <div class="mb-4">
                <h3 class="text-lg font-medium mb-2">Payment Information</h3>
                <form>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="card_number" class="block text-sm font-medium text-gray-600">Card Number</label>
                            <input type="text" id="card_number" name="card_number"
                                class="mt-1 p-2 w-full border rounded-md text-sm">
                        </div>
                        <div>
                            <label for="expiration_date"
                                class="block text-sm font-medium text-gray-600">Expiration Date</label>
                            <input type="text" id="expiration_date" name="expiration_date"
                                class="mt-1 p-2 w-full border rounded-md text-sm">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="cvv" class="block text-sm font-medium text-gray-600">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="mt-1 p-2 w-full border rounded-md text-sm">
                    </div>
                </form>
            </div>

            <!-- Place Order Button -->
            <div class="flex justify-end">
                <button
                    class="bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-600 text-sm">
                    <a href="{{ route('order') }}">
                    PlaceOrder
                    </a>
                </button>
            </div>
        </div>
    </div>
    @include('components.footer')

</body>

</html>
