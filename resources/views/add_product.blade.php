<!-- resources/views/add_product.blade.php -->

@extends('dashboard')
@section('content')
<div class="w-full">
    <h2 class="text-2xl font-bold mb-4">Add New Product</h2>
    <form method="post" id="addProduct" action="{{ url('api/products/add') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 p-2 border rounded-md w-full"
                required></textarea>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="category" class="mt-1 p-2 border rounded-md w-full" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="shop" class="block text-sm font-medium text-gray-700">Shop</label>
            <select name="shop_ids[]" id="shop" class="mt-1 p-2 border rounded-md w-full" required>
                <option value="">Select Shop</option>
                @foreach($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                @endforeach
            </select>
        </div>
        <div id="additionalShops" class="mb-4 mt-4"></div>
        <button type="button" id="add-shop-btn" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Add Other
            Shop</button>
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="mt-1 p-2 border rounded-md w-full" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price" class="mt-1 p-2 border rounded-md w-full" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 p-2 border rounded-md w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Product</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addProductForm = document.getElementById('addProduct');

        addProductForm.addEventListener('submit', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Handle form submission asynchronously using AJAX
            // Example using fetch API
            fetch(addProductForm.action, {
                method: 'POST',
                body: new FormData(addProductForm),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    // Redirect to /dashboardProducts on success
                    window.location.href = '/dashboardProducts';
                } else {
                    // Handle errors or display a message
                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
@endsection