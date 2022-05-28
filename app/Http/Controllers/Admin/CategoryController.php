<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Rules\CheckNameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
//        $categories = Category::all();
//        $categories = Category::paginate(10,'*','p');
        $categories = Category::paginate(10);
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        $category = new Category();


        return view('categories.create', ['categories' => $categories,
            'category' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
//        $this->validate($request,[
//            'name' => 'required|max:200|string',
//            'description' => ['required', 'max:20', 'string'],
//        ]);

//        $request->validate([
//            'name' => 'required|max:200|string',
//            'description' => ['required', 'max:20', 'string'],
//        ],[
//            'name.required' => 'the :attribute can not be empty',
//            'max' => 'the :attribute can not be empty'
//        ]);
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:200|string',
//            'description' => ['required', 'max:20', 'string'],
//        ]);
//       // $validator->validate();
//      if ($validator->fails()){
//          return redirect('/categories/create')
//              ->withErrors($validator)
//              ->withInput();
//      }


//        $category = new Category();
//        $category->name = $request->name;
//        $category->description = $request->description;
//        $category->slug = Str::slug($request->name);
//        $category->parent_id = $request->parent_id;
//        $category->save();
//        $category = Category::create([
//            'name' => $request->name,
//            'description' => $request->description,
//            'slug' => Str::slug($request->name),
//            'parent_id' => $request->name,
//        ]);


        $request['slug'] = Str::slug($request->name);
        //dd($request->only('name','description'));
        //dd($request->except('name','description'));
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category Added');
//        return redirect()->back();
    }

    public function edit(Category $category)
    {
//        $category = Category::where('id', $id)->first();
//        $category = Category::find($id);
//        if (!$category){
//            abort(404);
//        }

//        $category = Category::findOrFail($id);



        $categories = Category::where('id', '<>', $category->id)->get();
        return view('categories.edit',
            compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate($this->rules());
//        $category = Category::findOrFail($id);
//        $category->name = $request->name;
//        $category->description = $request->description;
//        $category->slug = Str::slug($request->name);
//        $category->parent_id = $request->parent_id;
//        $category->save();
        $request['slug'] = Str::slug($request->name);
        $category->update($request->all());

//        return redirect('/categories')->with('success', 'Category updated');

        return redirect()->route('categories.index')
            ->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
//        $category = Category::findOrFail($id);
        $category->delete();
    //    Category::destroy($id);
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted');
    }


    protected function rules()
    {
        return [

            'name' => ['required', 'max:200', new CheckNameRule],

//            'name' => ['required','max:200',function ($attribute, $value, $fail) {
//                if ($value == "mohammd") {
//                    $fail("you can not use this name");
//                }
//            }],
            'description' => ['required', 'max:20', 'string'],
//            'image' => 'mimes:jpg,bmp,png',
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }
}
