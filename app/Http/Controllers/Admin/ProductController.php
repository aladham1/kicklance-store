<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
//        $products = Product::leftJoin('categories',
//            'categories.id','=','products.category_id')
//            ->select('products.*','categories.name as category_name')
//            ->get();

        $products = Product::with('category')->get();
        return view('products.index', ['products' => $products]);
    }


    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('products.create', ['categories' => $categories
            , 'product' => $product]);
    }


    public function store(Request $request)
    {
        $request->validate($this->rules());

        $image = $request->file('image');
        $data = $request->all();
        if ($image->isValid()) {
//           $imageName = $image->getClientOriginalName();
//           $imageExt = $image->getClientOriginalExtension();
//          $image->storeAs('products','mm.png','public');

            $image_url = $image->store('products', 'public');
            $data['image'] = $image_url;

        }
        Product::create($data);
        return redirect()->route('products.index')
            ->with('success', 'Product Added');
    }


    public function show($id)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', ['categories' => $categories
            , 'product' => $product]);
    }


    public function update(Request $request, Product $product)
    {
        $request->validate($this->rules());

        $data = $request->all();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $image_url = $image->store('products', 'public');
            $data['image'] = $image_url;
            Storage::disk('public')->delete($product->image);
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->image);
        return redirect()->route('products.index')
            ->with('success', 'Product deleted');
    }

    protected function rules()
    {
        return [
            'title' => ['required', 'max:200'],
            'description' => ['required', 'string'],
            'image' => 'nullable|mimes:jpg,bmp,png',
            'category_id' => 'required|exists:categories,id',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
        ];
    }
}
