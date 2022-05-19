<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories'=>$categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->save();

       return redirect('/categories')->with('success','Category Added');
//        return redirect()->back();
    }

    public function edit($id)
    {
//        $category = Category::where('id', $id)->first();
//        $category = Category::find($id);
//        if (!$category){
//            abort(404);
//        }

        $category = Category::findOrFail($id);
        $categories = Category::where('id','<>', $id)->get();
        return view('categories.edit',compact('category','categories'));
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect('/categories')->with('success','Category updated');
    }

}
