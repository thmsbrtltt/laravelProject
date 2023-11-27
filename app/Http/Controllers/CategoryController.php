<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate(['name' => 'required|unique:categories|max:255',]);
    
        Category::create(['name' => $request->input('name'),]);

        return redirect('/categories')->with('success', 'Category created successfully!');
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
   
    //part 2 additions
    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $request->validate(['name' => 'required|unique:categories|max:255',]);
    
        $category = Category::find($id);

        if(!$category){
            return redirect('/categories')->with('error', 'Category not found');
        }

        $category->update(['name' => $request->input('name'),]);
    
        return redirect('/categories')->with('success', 'Category update successful!');
    }
    

}
