<?php
namespace App\Http\Controllers;
class DashboardShops extends Controller
{
    public function index()
    {
        return view('dashboardShops', ['title' => 'Shops']);
    }
}