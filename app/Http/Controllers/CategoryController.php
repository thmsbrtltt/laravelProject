<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
   

}
