<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // Import Cloudinary facade


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
                'shop_id' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
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

                // Save user with Cloudinary URL
                $product = new Product([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'shop_id' => $request->shop_id,
                    'image' => $cloudinaryUrl
                ]);
                $product->save();
            } else {
                $product = new Product([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'shop_id' => $request->shop_id,
                    'image' => $request->image,
                ]);
                $product->save();
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
    

    public function showHomeProduct(Request $request)
    {
        try {
            $response = $this->getProducts($request);
    
            // Check if the response has the 'status' key and it's true
            if ($response->original['status'] && isset($response->original['products'])) {
                $products = $response->original['products']; // Remove ['products'] here
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
    
    


    


}
