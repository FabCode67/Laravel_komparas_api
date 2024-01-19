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

<body class="bg-gray-100">
    @include('components.navbar')
    <div class="container mx-auto min-h-screen">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-4 mt-32">Orders</h2>

            <!-- Order List -->
            <div>
                <!-- Single Order Card -->
                <div class="bg-gray-50 p-4 rounded-md mb-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-md overflow-hidden">
                                <img src="https://placekitten.com/200/200" alt="Product Image"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">Order #123456</h3>
                                <p class="text-gray-600">Placed on August 1, 2023</p>
                            </div>
                        </div>
                        <span class="text-blue-700 font-semibold">$99.95</span>
                    </div>

                    <ul class="mt-4 space-y-2">
                        <!-- Order Items -->
                        <li class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gray-300 rounded-md overflow-hidden">
                                <img src="https://placekitten.com/150/150" alt="Product Image"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-md font-medium">Product Name</h4>
                                <p class="text-gray-600">Quantity: 2</p>
                            </div>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="font-medium">Total</span>
                            <span class="text-blue-700 font-semibold">$99.95</span>
                        </li>
                    </ul>

                    <div class="flex justify-end mt-4">
                        <button class="bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                            <a href="{{ route('trackOrder') }}">
                            Track Order
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')

</body>

</html>
