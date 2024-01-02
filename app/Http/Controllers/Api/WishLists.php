<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishLists as WishListsModel;
use Illuminate\Support\Facades\Log;

class WishLists extends Controller
{
    public function addToWishLists(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'product_id' => 'required|exists:products,id',
                'shop_id' => 'required|exists:shops,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
            ]);

            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            $shop_id = $request->input('shop_id');
            $quantity = $request->input('quantity');
            $price = $request->input('price');

            $wishLists = WishListsModel::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('shop_id', $shop_id)
                ->where('quantity', $quantity)
                ->where('price', $price)
                ->first();

            if ($wishLists) {
                return response()->json(['message' => 'Product already in wishLists'], 400);
            } else {
                $wishLists = new WishListsModel([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'shop_id' => $shop_id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
                $wishLists->save();
            }

            return response()->json(['message' => 'Product added to wishLists successfully', 'wishLists' => $wishLists], 201);
        } catch (\Exception $e) {
            Log::error($e);
            echo $e;

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function getWishLists(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $user_id = $request->input('user_id');

            $wishLists = WishListsModel::where('user_id', $user_id)->get();

            return response()->json(['message' => 'WishLists retrieved successfully', 'wishLists' => $wishLists], 200);
        } catch (\Exception $e) {
            Log::error($e);


            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function deleteWishLists(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'product_id' => 'required|exists:products,id',
                'shop_id' => 'required|exists:shops,id',
            ]);

            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            $shop_id = $request->input('shop_id');

            $wishLists = WishListsModel::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('shop_id', $shop_id)
                ->first();

            if (!$wishLists) {
                return response()->json(['message' => 'Product not found in wishLists'], 404);
            }

            $wishLists->delete();

            return response()->json(['message' => 'Product deleted from wishLists successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function deleteWishListsAll(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $user_id = $request->input('user_id');

            $wishLists = WishListsModel::where('user_id', $user_id)->delete();

            return response()->json(['message' => 'WishLists deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function removeProductOnWishLists(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'product_id' => 'required|exists:products,id',
                'shop_id' => 'required|exists:shops,id',
            ]);

            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            $shop_id = $request->input('shop_id');

            $wishLists = WishListsModel::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('shop_id', $shop_id)
                ->first();

            if (!$wishLists) {
                return response()->json(['message' => 'Product not found in wishLists'], 404);
            }

            $wishLists->delete();

            return response()->json(['message' => 'Product deleted from wishLists successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }
}
