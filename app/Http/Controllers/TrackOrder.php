<?php
namespace App\Http\Controllers;
class TrackOrder extends Controller
{
    public function index()
    {
        return view('trackOrder', ['title' => 'trackOrder']);
    }
}