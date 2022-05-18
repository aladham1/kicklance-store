<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller
{
    public $products = [
        '1' => [
            'title' => 'product 1',
            'description' => ' Product 1 Description',
            'price' => '20 $'
        ],
        '2' => [
            'title' => 'product 2',
            'description' => ' Product 2 Description',
            'price' => '30 $'
        ],
        '3' => [
            'title' => 'product 3',
            'description' => ' Product 3 Description',
            'price' => '40 $'
        ],
    ];


    public function index()
    {
        return view('products',['products' => $this->products]);
    }

    public function show($id)
    {
        if (!isset($this->products[$id])) {
           abort(404);
        }
        return $this->products[$id];
    }
}
