<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\UsersModel as User;
use Illuminate\Http\Request;
class DashboardUsers extends Controller
{
    public function showAllUsers()
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
            'users' => $users,
            'message' => 'All users retrieved successfully.',
        ];
        return response()->json($data, 200);
    }
    public function index( Request $request )
    {
        $response = $this->showAllUsers();
        if($response->original['status']){
            $users = $response->original['users'];
            return view('dashboardUsers', ['title' => 'users'], compact('users'));
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No users found',
            ], 404);
        }
    }
}