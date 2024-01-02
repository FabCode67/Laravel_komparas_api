<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Log;



class Cart extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'product_id' => 'required|exists:products,id',
                'shop_id' => 'required|exists:shops,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            $shop_id = $request->input('shop_id');
            $quantity = $request->input('quantity');

            $cart = CartModel::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('shop_id', $shop_id)
                ->first();

            if ($cart) {
                $cart->quantity += $quantity;
                $cart->save();
            } else {
                $cart = new CartModel([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'shop_id' => $shop_id,
                    'quantity' => $quantity,
                    'price' => '0',
                ]);
                $cart->save();
            }

            return response()->json(['message' => 'Product added to cart successfully', 'cart' => $cart], 201);
        } catch (\Exception $e) {
            Log::error($e);
            echo $e;

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function getCart(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);
            $user_id = $request->input('user_id');
            $cart = CartModel::where('user_id', $user_id)->get();
            return response()->json(['message' => 'Cart retrieved successfully', 'cart' => $cart], 200);
        } catch (\Exception $e) {
            Log::error($e);
            echo $e;
            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function updateCart(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'product_id' => 'required|exists:products,id',
                'shop_id' => 'required|exists:shops,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $user_id = $request->input('user_id');
            $product_id = $request->input('product_id');
            $shop_id = $request->input('shop_id');
            $quantity = $request->input('quantity');

            $cart = CartModel::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('shop_id', $shop_id)
                ->first();

            if (!$cart) {
                return response()->json(['message' => 'Product not found in cart'], 404);
            }
            
            $cart->quantity = $quantity;
            $cart->save();

            return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

  public function deleteProductFromCart(Request $request)
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

            $cart = CartModel::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('shop_id', $shop_id)
                ->first();

            if (!$cart) {
                return response()->json(['message' => 'Product not found in cart'], 404);
            }

            $cart->delete();

            return response()->json(['message' => 'Product deleted from cart successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function deleteCart(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $user_id = $request->input('user_id');

            $cart = CartModel::where('user_id', $user_id)->delete();

            return response()->json(['message' => 'Cart deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }


}
