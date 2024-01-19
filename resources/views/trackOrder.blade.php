<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Track Order</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="bg-white p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Track Your Order</h2>

            <!-- Order Tracking Form -->
            <form>
                <label for="order_number" class="block text-sm font-medium text-gray-600">Order Number</label>
                <div class="flex items-center space-x-4">
                    <input type="text" id="order_number" name="order_number"
                        class="flex-1 p-2 border rounded-md" placeholder="Enter your order number">
                    <button type="submit"
                        class="bg-blue-700 text-white py-2 px-4 rounded-md hover:bg-blue-600">Track</button>
                </div>
            </form>

            <div class="mt-8">
                <h3 class="text-lg font-medium mb-2">Order Details</h3>
                <ul class="divide-y divide-gray-200">
                    <li class="flex justify-between items-center py-2">
                        <span class="font-medium">Order Status</span>
                        <span class="text-blue-700 font-semibold">Shipped</span>
                    </li>
                    <li class="flex justify-between items-center py-2">
                        <span class="font-medium">Estimated Delivery Date</span>
                        <span class="text-gray-700">August 10, 2023</span>
                    </li>
                    <li class="flex justify-between items-center py-2">
                        <span class="font-medium">Shipping Carrier</span>
                        <span class="text-gray-700">FedEx</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
