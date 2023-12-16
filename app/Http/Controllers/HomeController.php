<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliderImages = [
            [
                'url' => 'https://images.unsplash.com/photo-1621574539437-8b9b0b5b9b0f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXR5JTIwY2F0ZWdvcnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
                'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1621574539437-8b9b0b5b9b0f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXR5JTIwY2F0ZWdvcnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
                'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1621574539437-8b9b0b5b9b0f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXR5JTIwY2F0ZWdvcnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
                'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1621574539437-8b9b0b5b9b0f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXR5JTIwY2F0ZWdvcnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
                'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
            ],            
        ];

        $currentSlide = 0; 
        // return view('components.home', compact('sliderImages', 'currentSlide'));
    }
}
