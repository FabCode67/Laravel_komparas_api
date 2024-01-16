<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Shops;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; 
class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'shop_ids' => 'required|array',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error.',
                    'errors' => $validator->errors(),
                ], 400);
            }
    
            if (Product::where('name', $request->name)->exists()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product with this name already exists',
                ], 400);
            }
    
            if ($request->hasFile('image')) {
                // Upload profile picture to Cloudinary
                $uploadedFile = $request->file('image');
                $cloudinaryResponse = Cloudinary::upload($uploadedFile->getRealPath());
                $cloudinaryUrl = $cloudinaryResponse->getSecurePath();
                $product = new Product([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'image' => $cloudinaryUrl,
                ]);
                $product->save();
            } else {
                $product = new Product([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'image' => $request->image,
                ]);
                $product->save();
            }
    
            foreach ($request->shop_ids as $shop_id) {
                $product->shops()->attach($shop_id);
            }
        
            return response()->json([
                'status' => true,
                'message' => 'Product added successfully',
                'product' => $product
            ], 201);
        } catch (\Exception $e) {
            Log::error($e);
    
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function getProducts(Request $request)
    {
        try {
            $products = Product::all();
            return response()->json([
                'status' => true,
                'message' => 'Products retrieved successfully',
                'products' => $products
            ], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }

    public function deleteProduct($id)
{
    try {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->shops()->detach();
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    } catch (\Exception $e) {
        Log::error($e);
        return response()->json(['message' => 'Server error kkkkkk'], 500);
    }
}

    public function updateProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            $product->update($request->all());
            return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }
    public function showHomeProductAndCategories1(Request $request)
    {
        try {
            $categories = Category::all();
            $products = Product::all();

            return response()->json([
                'status' => true,
                'message' => 'Categories and products retrieved successfully',
                'categories' => $categories,
                'products' => $products
            ], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
    public function showHomeProductAndCategories(Request $request)
    {
        try {
            $categories = Category::all();
            $products = Product::all();
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
    public function getCategories(Request $request)
    {
        try {
            $products = $this->getProducts($request);
            $categories = $this->getCategories($request);
            if ($products->original['status'] && isset($products->original['products'])) {
                $products = $products->original['products'];
                $categories = $categories->original['categories'];
                return view('welcome', compact('products', 'categories'));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No products found',
                ], 404);
            }

        } catch (\Exception $e) {
            Log::error($e);


            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function deleteProductPage(Request $request, $id)
    {
        try {
            $request->route('id');
            $id = $request->route('id');
            $response = $this->deleteProduct($request, $id);
            if ($response->original['status']) {
                $products = $response->original['products'];
                return view('dashboardProducts', compact('products'));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No products found',
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
    public function updateProductPage(Request $request, $id)
    {
        try {
            $request->route('id');
            $id = $request->route('id');
            $response = $this->updateProduct($request, $id);
            if ($response->original['status']) {
                $products = $response->original['products'];
                return view('dashboardProducts', compact('products'));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No products found',
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
    public function showHomeProduct(Request $request)
    {
        try {
            $response = $this->getProducts($request);
            if ($response->original['status'] && isset($response->original['products'])) {
                $products = $response->original['products'];
                return view('welcome', compact('products'));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No products found',
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
    public function showHomeProductAndCat(Request $request)
    {
        try {
            $response = $this->showHomeProductAndCategories1($request);
            if ($response->original['status'] && isset($response->original['products'])) {
                $products = $response->original['products'];
                return view('welcome', compact('products'));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No products found',
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
    public function getSingleProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $shopId = Product::with('shops')->find($id);
            $shop = Shops::find($shopId);
            $categoryId = $product->category_id;
            $categoryProducts = Product::where('category_id', $categoryId)->get();
            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            return response()->json(['status'=>true, 'message' => 'Product retrieved successfully','shop' => $shop, 'categoryProduct' =>$categoryProducts, 'product' => $product], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }
    public function showSingleProductPage(Request $request, $id)
    {
        try {
            $request->route('id');
            $id = $request->route('id');
            $response = $this->getSingleProduct($request, $id);
            $shop = $response->original['shop'];
            $categoryId = $response->original['product']['category_id'];
            $categoryProducts = Product::where('category_id', $categoryId)->get();
            if ($response->original['status']) {
                $product = $response->original['product'];
                return view('singleProductPage', compact('product','shop', 'categoryProducts'));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No product found',
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
}
