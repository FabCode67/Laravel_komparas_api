<?php
namespace App\Http\Controllers;
class DashboardOrders extends Controller
{
    public function index()
    {
        return view('dashboardOrders', ['title' => 'Orders']);
    }
}