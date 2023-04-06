<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(5)->get();

        return view('home', compact('latestProducts'));
    }
}
