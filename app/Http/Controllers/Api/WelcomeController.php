<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class WelcomeController extends Api
{
    public function index()
    {
        return view('welcome');
    }
}
