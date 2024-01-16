<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as Category;
use Illuminate\Support\Facades\Log;
use App\Models\Shops;

class AddNewProductController extends Controller
{
    public function getCategories()
    {
        try {
            $categories = Category::all();
            return response()->json([
                'status' => true,
                'message' => 'Categories retrieved successfully',
                'categories' => $categories
            ], 200);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['message' => 'Server error'], 500);
        }
    }
    public function showAllShops()
    {
        try {
            $shop = Shops::all();
            return response()->json([
                'status' => true,
                'message' => 'Shops retrieved successfully',
                'shops' => $shop
            ], 200);

            if ($shop->count() > 0) {
                return response()->json([
                    'status' => true,
                    'message' => 'Shops retrieved successfully',
                    'shops' => $shop
                ], 200);
            } else {
                return response()->json([
                    'message' => 'No shops found',
                ], 404);
            }

        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }
    public function create()
    {
        $categories = $this->getCategories();
        $shops = $this->showAllShops();
        if ($categories->original['status'] && $shops->original['status']) {
            $categories = $categories->original['categories'];
            $shops = $shops->original['shops'];
            return view('add_product', ['title' => 'Add New Product'], compact('categories', 'shops'));
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No categories or shops found',
            ], 404);
        }
    }
}
