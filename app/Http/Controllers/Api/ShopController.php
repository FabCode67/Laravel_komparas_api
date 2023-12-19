<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Shops;
use Illuminate\Support\Facades\Validator;



class ShopController extends Controller
{
    public function createShop(Request $request){
        try{
        
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'location' => 'required|string',
                'working_hours' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string',
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error.',
                    'errors' => $validator->errors(),
                ], 400);
            }

            $shops = Shops::create($request->only('name','location',
            'working_hours','phone','email','description'));
            return response()->json([
                'message' => 'Shop created successfully',
                'shop' => $shops
            ], 201);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
            ], 500);
        }
    }

    public function getShops(Request $request){
        try{
            $shop = Shops::all();
            return response()->json([
                'message' => 'Shops retrieved successfully',
                'shops' => $shop
            ], 200);
        
            if($shop->count() > 0){
                return response()->json([
                    'message' => 'Shops retrieved successfully',
                    'shop' => $shop
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
                'phone' => 'required|string',
                'email' => 'required|string',
                'description' => 'required|string',
            ]);

            $shop = Shops::find($request->id);
            if(!$shop){
                return response()->json([
                    'message' => 'Shop not found'
                ], 404);
            }
            $shop->update($request->only('name','location',
            'working_hours'));
            return response()->json([
                'message' => 'Shop updated successfully',
                'shops' => $shop
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
            $shop = Shops::find($request->id);
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
