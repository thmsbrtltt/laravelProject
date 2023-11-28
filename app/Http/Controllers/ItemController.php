<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // -> CREATE FUNCTION
    public function create(){
        $categories = Category::all();

        return view('items.create', compact('categories'));
    }

    // -> STORE FUNCTION
    public function store(Request $request){
     
        if (empty($request->input('title'))) {
           
            $message = 'Custom field cannot be empty';
            return redirect()->back()->with('custom_error', $message);
        }
       
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

    // -> INDEX FUNCTION
    public function index()
    {
        $items = Item::all();
       
        return view('items.index', compact('items'));
    }

    // -> EDIT FUNCTION
    public function edit($id){
        $item = Item::find($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    // -> UPDATE FUNCTION
    public function update(Request $request, $id){

        $item = Item::find($id);
    
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $item->update([ 
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
        ]);
    
        if ($request->hasFile('picture')) {
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $picturePath = $request->file('picture')->store('images', 'public');
    
            if ($item->picture) {
                Storage::disk('public')->delete($item->picture);
            }
    
         
            $item->update(['picture' => $picturePath]);
        }
    
        return redirect('/items')->with('success', 'Item updated successfully!');
    }

    // -> CONFIRM DELETE FUNCTION
    public function confirmDelete($id)
    {
        $item = Item::findOrFail($id);
        return view('items.confirm-delete', compact('item'));
    }

    // -> DESTROY DELETE FUNCTION
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        Storage::disk('public')->delete($item->picture);

        $item->delete();

        return redirect('/items')->with('success', 'Item deleted successfully!');
    }
}


