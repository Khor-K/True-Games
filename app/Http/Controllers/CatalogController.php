<?php
namespace App\Http\Controllers;

use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('catalog.index', ['products' => $products]);
    }
}
