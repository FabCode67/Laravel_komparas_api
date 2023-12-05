<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Shop;


class ShopController extends Controller
{
    public function createShop(Request $request){
        try{
            $request->validate([
                'name' => 'required|string',
                'location' => 'required|string',
                'working_hours' => 'required|string',
            ]);

            $shop = Shop::create($request->only('name','location',
            'working_hours'));
            return response()->json([
                'message' => 'Shop created successfully',
                'shop' => $shop
            ], 201);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }

    public function getShops(Request $request){
        try{
            $shops = Shop::all();
            return response()->json([
                'message' => 'Shops retrieved successfully',
                'shops' => $shops
            ], 200);
        
            if($shops->count() > 0){
                return response()->json([
                    'message' => 'Shops retrieved successfully',
                    'shops' => $shops
                ], 200);
            }else{
                return response()->json([
                    'message' => 'No shops found',
                ], 404);
            }

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }
    public function updateShop(Request $request){
        try{
            $request->validate([
                'name' => 'required|string',
                'location' => 'required|string',
                'working_hours' => 'required|string',
            ]);

            $shop = Shop::find($request->id);
            if(!$shop){
                return response()->json([
                    'message' => 'Shop not found'
                ], 404);
            }
            $shop->update($request->only('name','location',
            'working_hours'));
            return response()->json([
                'message' => 'Shop updated successfully',
                'shop' => $shop
            ], 200);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }
    public function deleteShop(Request $request){
        try{
            $shop = Shop::find($request->id);
            if(!$shop){
                return response()->json([
                    'message' => 'Shop not found'
                ], 404);
            }
            $shop->delete();
            return response()->json([
                'message' => 'Shop deleted successfully',
            ], 200);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }


}
