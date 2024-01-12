<?php
namespace App\Http\Controllers;
class DashboardCategories extends Controller
{
    public function index()
    {
        return view('dashboardCategories', ['title' => 'Categories']);
    }
}