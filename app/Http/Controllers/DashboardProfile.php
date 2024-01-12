<?php
namespace App\Http\Controllers;
class DashboardProfile extends Controller
{
    public function index()
    {
        return view('dashboardProfile', ['title' => 'Profile']);
    }
}