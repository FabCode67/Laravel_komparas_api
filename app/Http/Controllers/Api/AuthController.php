<?php

namespace App\Http\Controllers\Api;

use App\Models\UsersModel;
use App\Http\Controllers\Controller;
use App\Models\UsersModel as User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; 
class AuthController extends Controller
{
    public function addUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'role' => 'optional',
                'address' => 'optional',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error.',
                    'errors' => $validator->errors(),
                ], 400);
            }

            if (User::where('email', $request->email)->exists()) {
                return response()->json([
                    'status' => false,
                    'message' => 'User with this email already exists',
                ], 400);
            }

            $hashedPassword = Hash::make($request->password);

            if ($request->hasFile('avatar')) {
                $uploadedFile = $request->file('avatar');
                $cloudinaryResponse = Cloudinary::upload($uploadedFile->getRealPath());
                $cloudinaryUrl = $cloudinaryResponse->getSecurePath();

                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => $hashedPassword,
                    'confirm_password' => $request->confirm_password,
                    'address' => 'default',
                    'role' => 'buyer',
                    'status' => 'enabled',
                    'avatar' => $cloudinaryUrl,
                    'api_token' => Str::random(60),
                ]);

                $token = $user->createToken('myapptoken')->plainTextToken;

            } else {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => $hashedPassword,
                    'confirm_password' => $request->confirm_password,
                    'address' => $request->address,
                    'role' => $request->role,
                    'status' => 'enabled',
                    'api_token' => Str::random(60),
                ]);

                $token = $user->createToken('myapptoken')->plainTextToken;
            }
            return response()->json([
                'status' => true,
                'message' => 'User added successfully',
                'user' => $user,
                'token'=> $token,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error adding user: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error(''. $e->getLine());
            Log::error('Line: ' . $e->getLine());
            echo $e->getMessage();

            return response()->json(
                [
                    'status' => false,
                    'message' => 'An error occurred while adding the user',
                    'error' => $e->getMessage(),

            ], 500);
        }
    }
    public function showRegisterForm(){
        return view('register');
     }
     public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    
        $user = UsersModel::where('email', $fields['email'])->first();
    
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return redirect('/login');
        }
    
        $token = $user->createToken('myapptoken')->plainTextToken;
    
        // Store user response and token in the session
        Session::put('user', $user);
        Session::put('token', $token);
    
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        if($user->role == 'admin'){
            return redirect('/admin');
        }else{
            return redirect('/');
        }
    }
    public function showLoginForm()
    {
        return view('login');
    }
 

    public function logout(Request $request)
    {
     Session::forget('user');
        Session::forget('token');
        return redirect('/login');
    }
    
    

    public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'message' => 'Validation error.',
            'errors' => $validator->errors(),
        ], 400);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'status' => 404,
            'message' => 'User not found.',
        ], 404);
    }

    // Generate a unique reset token
    $resetToken = Str::uuid()->toString();

    // Store the reset token and its expiration time in the database
    $user->update([
        'reset_token' => $resetToken,
        'reset_token_expiry' => now()->addHour(), // Token expiration time (e.g., 1 hour)
    ]);

    // Send reset link email
    $resetLink = url("/password/reset/{$resetToken}");
    Mail::to($user->email)->send(new ResetPasswordMail($resetLink));

    return response()->json([
        'status' => 200,
        'message' => 'Password reset link sent successfully.',
    ], 200);
}

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
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
            'message' => 'Password changed successfully.',
        ];
        return response()->json($data, 200);
    }
}