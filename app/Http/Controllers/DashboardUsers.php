<?php
namespace App\Http\Controllers;
class DashboardUsers extends Controller
{
    public function index()
    {
        return view('dashboardUsers', ['title' => 'Users']);
    }
}