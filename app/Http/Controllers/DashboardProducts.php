<?php
namespace App\Http\Controllers;
class DashboardProducts extends Controller
{
    public function index()
    {
        return view('dashboardProducts', ['title' => 'product']);
    }
}