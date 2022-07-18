<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('images','category','tags')->findOrFail($id);
        return view('store.products.show', ['product' => $product]);
    }
}
