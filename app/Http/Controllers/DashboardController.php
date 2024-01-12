<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Dashboard',
        ];
        if ($request->routeIs('about')) {
            return view('about', $data);
        } elseif ($request->routeIs('dashboard')) {
            return view('home', $data);
        }
        elseif ($request->routeIs('dashboardProduct')) {
            return view('dashboardProduct', $data);
        }

        return view('home', $data);
    }
}
