<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddNewProductController extends Controller
{
    public function create()
    {
        return view('add_product', ['title' => 'Add Product']);
    }
}
