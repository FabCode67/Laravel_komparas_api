<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as Category;
use Illuminate\Support\Facades\Log;

class DashboardCategories extends Controller
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

    public function index()
    {
        $response = $this->getCategories();
        if ($response->original['status']) {
            $categories = $response->original['categories'];
            $categories = Category::paginate(10);
            return view('dashboardCategories', ['title' => 'Categories'], compact('categories'));
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No categories found',
            ], 404);
        }
    }
}