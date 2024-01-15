<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardProducts extends Controller
{
    public function getProducts()
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
    public function index()
    {
        $response = $this->getProducts();
        if($response->original['status']){
            $products = $response->original['products'];
            $products = Product::paginate(10);
            return view('dashboardProducts', ['title' => 'Products'], compact('products'));
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No products found',
            ], 404);
        }
    }
    public function showAllProducts()
    {
        $products = Product::all();
        if (count($products) < 1) {
            $data = [
                'status' => 404,
                'message' => 'No products found.',
            ];
            return response()->json($data, 404);
        }
        return view('dashboardProducts', ['title' => 'product']);
    }
}