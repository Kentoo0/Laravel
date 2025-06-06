<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UploadController extends Controller
{
    public function store(Request $request)
    {
      
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_id' => 'required|exists:products,id', 
        ]);

        $file = $request->file('image');

       
        $filename = time() . '.' . $file->getClientOriginalExtension();

      
        $file->move(public_path('images'), $filename);

        
        $product = Product::findOrFail($request->product_id);
        $product->image = 'images/' . $filename;
        $product->save();

        return back()->with('success', 'Image uploaded and saved to database!');
    }
}
