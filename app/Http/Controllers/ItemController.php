<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function create(){
        $categories = Category::all();

        return view('items.create', compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //image handling
        $picturePath = $request->file('picture')->store('images', 'public');
        
        $item = Item::create([ 
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
            'picture' => $picturePath,
        ]);

        //new addition - 9:42pm
        $category = Category::find($request->input('category_id'));
        $category->items()->save($item);

        return redirect('/items')->with('success', 'Item created successfully!');
    }

    //REMEMBER -> index function
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
}


