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

<body>
    @include('components.navbar')
    @include('components.navbar')
    <div class="w-full min-h-screen flex flex-col">
        <h1 class="text-3xl font-semibold mb-4">Shopping Cart</h1>
        <div class="mt-8 bg-white p-6 rounded-md shadow-md">
            <h2 class="text-xl font-semibold mb-4">Cart Summary</h2>
            <ul>
                <li class="flex justify-between items-center border-b border-gray-300 py-2">
                    <div class="flex items-center space-x-4">
                        <button class="text-red-500 hover:text-red-600 focus:outline-none focus:text-red-600"
                            aria-label="Remove">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M14.293 5.293a1 1 0 10-1.414-1.414L10 8.586 6.707 5.293a1 1 0 10-1.414 1.414L8.586 
                                    10l-3.293 3.293a1 1 0 101.414 1.414L10 11.414l3.293 
                                    3.293a1 1 0 001.414-1.414L11.414 10l3.293-3.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <img src="https://placekitten.com/50/50" alt="Product Image" class="rounded-md">
                        <span class="font-semibold">Product Name</span>
                    </div>
                    <span class="text-blue-700 font-semibold">x 1</span>
                    <span class="text-blue-700 font-semibold">$19.99</span>
                </li>
            </ul>
            <div class="flex justify-between items-center mt-4">
                <span class="text-lg font-semibold">Subtotal:</span>
                <span class="text-blue-700 font-semibold">$79.96</span>
            </div>
            <div class="flex justify-between items-center mt-4">
                <span class="text-lg font-semibold">Shipping:</span>
                <span class="text-blue-700 font-semibold">$19.99</span>
            </div>
            <div class="flex justify-between items-center mt-4">
                <span class="text-lg font-semibold">Tax:</span>
                <span class="text-blue-700 font-semibold">$0.00</span>
            </div>

            <div class="flex justify-between items-center mt-4">
                <span class="text-lg font-semibold">Total:</span>
                <span class="text-blue-700 font-semibold">$99.95</span>
            </div>
            <button class="mt-4 bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                <a href="{{ route('checkout') }}">
                Proceed to
                Checkout
                </a>
            </button>

        </div>
    </div>
    @include('components.footer')

</body>

</html>