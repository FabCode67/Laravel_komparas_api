<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsersModel as User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (count($users) < 1) {
            $data = [
                'status' => 404,
                'message' => 'No users found.',
            ];
            return response()->json($data, 404);
        }

        $data = [
            'status' => 200,
            'Users' => $users,
            'message' => 'All users retrieved successfully.',
        ];
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            $data = [
                'status' => 404,
                'message' => 'User not found.',
            ];
            return response()->json($data, 404);
        }

        $data = [
            'status' => 200,
            'user' => $user,
            'message' => 'User retrieved successfully.',
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'role' => 'required',
                'status' => 'required',
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error.',
                    'errors' => $validator->errors(),
                ], 400);
            }

            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found.',
                ], 404);
            }

            if ($request->hasFile('profile_picture')) {
                $uploadedFile = $request->file('profile_picture');
                $path = $uploadedFile->store('profile_pictures', 'public');

                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'role' => $request->role,
                    'status' => $request->status,
                    'avatar' => $path, 
                    'profile_picture' => Storage::url($path),
                ]);
            } else {
                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'role' => $request->role,
                    'status' => $request->status,
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'User updated successfully',
                'user' => $user,
            ], 200);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error updating user: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error('File: ' . $e->getFile());
            \Illuminate\Support\Facades\Log::error('Line: ' . $e->getLine());
        
            return response()->json([
                'status' => false,
                'message' => 'An error occurred
                while updating the user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            $data = [
                'status' => 404,
                'message' => 'User not found.',
            ];
            return response()->json($data, 404);
        }

        $user->delete();
        $data = [
            'status' => 200,
            'message' => 'User deleted successfully.',
        ];
        return response()->json($data, 200);
    }

    public function search($name)
    {
        $user = User::where('first_name', 'like', '%' . $name . '%')->get();
        if (count($user) < 1) {
            $data = [
                'status' => 404,
                'message' => 'User not found.',
            ];
            return response()->json($data, 404);
        }

        $data = [
            'status' => 200,
            'user' => $user,
            'message' => 'User retrieved successfully.',
        ];
        return response()->json($data, 200);
    }
 
    public function logout()
    {
        $data = [
            'status' => 200,
            'message' => 'User logged out successfully.',
        ];
        return response()->json($data, 200);
    }

  

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',

        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ];
            return response()->json($data, 400);
        }

        $data = [
            'status' => 200,
            'message' => 'Profile updated successfully.',
        ];
        return response()->json($data, 200);
    }

    public function updateProfilePicture(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => 'required',

        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ];
            return response()->json($data, 400);
        }

        $data = [
            'status' => 200,
            'message' => 'Profile picture updated successfully.',
        ];
        return response()->json($data, 200);
    }

    public function updateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',

        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ];
            return response()->json($data, 400);
        }

        $data = [
            'status' => 200,
            'message' => 'Email updated successfully.',
        ];
        return response()->json($data, 200);
    }

    

}
