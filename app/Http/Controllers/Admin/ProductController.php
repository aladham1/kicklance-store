<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $products = Product::with('category','tags')->get();
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
        if ($request->hasFile('image')) {
            if ($image->isValid()) {
//           $imageName = $image->getClientOriginalName();
//           $imageExt = $image->getClientOriginalExtension();
//          $image->storeAs('products','mm.png','public');

                $image_url = $image->store('products', 'public');
                $data['image'] = $image_url;

            }
        }
        $product = Product::create($data);
        if ($request->tags) {
            $tagIds = [];
            $tags = explode(',', $request->tags);
           foreach ($tags as $item) {
                $tag = Tag::where('name', $item)->first();
               if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item,
                       'slug' => Str::slug($item)
                   ]);
               }
               $tagIds[] = $tag->id;
           }
           $product->tags()->attach($tagIds);
        }

//        tag_id, product_id
//        foreach ($request->tags as $tag){
//            DB::table('product_tag')->insert([
//                'product_id' => $product->id,
//                'tag_id' => $tag,
//            ]);
//        }
        return redirect()->route('products.index')
            ->with('success', 'Product Added');
    }


    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = $product->tags()->pluck('name')->toArray();
        $tags = implode(',', $tags);

        return view('products.edit', ['categories' => $categories
            , 'product' => $product, 'tags' => $tags]);
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
        if ($request->tags) {
            $tags = explode(',', $request->tags);
//            DB::table('product_tag')
//                ->where('product_id', $product->id)->delete();
            $tagIds = [];
            foreach ($tags as $item) {
                $tag = Tag::where('name', $item)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item,
                        'slug' => Str::slug($item)
                    ]);
                }
                $tagIds[] = $tag->id;


//                DB::table('product_tag')->insert([
//                    'product_id' => $product->id,
//                    'tag_id' => $tag->id,
//                ]);
            }
            $product->tags()->sync($tagIds);
//            $product->tags()->detach();
//            $product->tags()->attach($tagIds);
        }
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

    public function tags($id)
    {
        $tag = Tag::with('products')->findOrFail($id);
        return $tag;
    }
}
