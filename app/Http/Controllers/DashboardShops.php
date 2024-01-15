<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Shops;
use App\Http\Controllers\Controller;
class DashboardShops extends Controller
{
    public function showAllShops(){
        try{
            $shop = Shops::all();
            return response()->json([
                'status' => true,
                'message' => 'Shops retrieved successfully',
                'shops' => $shop
            ], 200);
        
            if($shop->count() > 0){
                return response()->json([
                    'status' => true,
                    'message' => 'Shops retrieved successfully',
                    'shops' => $shop
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
    public function index()
    {
        $response = $this->showAllShops();
        if($response->original['status']){
            $shops = $response->original['shops'];
            $shops = Shops::paginate(10);
            return view('dashboardShops', ['title' => 'Shops'], compact('shops'));
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No shops found',
            ], 404);
        }
    }
}