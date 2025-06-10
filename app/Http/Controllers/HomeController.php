<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
       
        $maleProducts = Product::where('category_id', 1)->get();
        $femaleProducts = Product::where('category_id', 2)->get();
        $unisexProducts = Product::where('category_id', 3)->get();

      
        $recommendProducts = Product::inRandomOrder()->take(4)->get();

        return view('home', compact('maleProducts', 'femaleProducts', 'unisexProducts', 'recommendProducts'));
    }
}
