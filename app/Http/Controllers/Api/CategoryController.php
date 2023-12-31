<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'parent_id' => 'nullable|exists:categories,id',
            ]);

            $name = $request->input('name');
            $parent_id = $request->input('parent_id');
            $existingCategory = Category::where('name', $name)->first();
            if ($existingCategory) {
                return response()->json(['message' => 'Category with the same name already exists'], 400);
            }
            $category = new Category(['name' => $name]);
            if ($parent_id) {
                $parentCategory = Category::find($parent_id);
                if (!$parentCategory) {
                    return response()->json(['message' => 'Parent category does not exist'], 400);
                }
                $category->parent_id = $parentCategory->id;
                $category->save();
                $parentCategory->children()->save($category);
            } else {
                $category->save();
            }

            return response()->json(['message' => 'Category added successfully', 'category' => $category], 201);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function getCategories(Request $request)
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

   public function showHomeGategories(Request $request)
    {
        try {
            $response = $this->getCategories($request);
            if ($response -> original['status'] && isset($response->original['categories'])) {
                $categories = $response->original['categories'];
                return view('welcome', compact('categories'));
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => false,
                'message' => 'Server error'
            ], 500);
        }
    }

    public function getCategory(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }
            return response()->json(['message' => 'Category retrieved successfully', 'category' => $category], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function updateCategory(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'parent_id' => 'nullable|exists:categories,id',
            ]);

            $name = $request->input('name');
            $parent_id = $request->input('parent_id');
            $category = Category::find($id);
            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }
            $existingCategory = Category::where('name', $name)->where('id', '!=', $id)->first();
            if ($existingCategory) {
                return response()->json(['message' => 'Category with the same name already exists'], 400);
            }
            $category->name = $name;
            if ($parent_id) {
                $parentCategory = Category::find($parent_id);
                if (!$parentCategory) {
                    return response()->json(['message' => 'Parent category does not exist'], 400);
                }
                $category->parent_id = $parentCategory->id;
                $category->save();
                $parentCategory->children()->save($category);
            } else {
                $category->save();
            }

            return response()->json(['message' => 'Category updated successfully', 'category' => $category], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function deleteCategory(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    public function searchCategory(Request $request, $name)
    {
        try {
            $categories = Category::where('name', 'like', '%' . $name . '%')->get();
            return response()->json(['message' => 'Categories retrieved successfully', 'categories' => $categories], 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json(['message' => 'Server error'], 500);
        }
    }
}
