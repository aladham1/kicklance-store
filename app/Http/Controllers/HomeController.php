<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('featured', true)->get();
        return view('store.index',['featuredProducts' => $featuredProducts]);
   }
}
