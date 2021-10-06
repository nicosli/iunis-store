<?php

namespace App\Http\Controllers;

use Validator;
use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function show(){
        return Inertia::render('Products/Show', [
            'products' => Products::with('variants')
                       ->with('provider')
                       ->with('category')
                       ->orderBy('id', 'desc')
                       ->paginate(10)
        ]);
    }

    public function delete(Request $request){
        $product = Products::find($request->input('product'));
        $product->delete();
        return back(303);
    }

    public function edit(Request $request){
        request()->validate([
            'name' => 'required',
            'barcode' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|url',
            'price' => 'required|numeric',
            'public_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'reviews' => 'required',
            'stars' => 'required|numeric|min:1|max:5',
            'category' => 'required|numeric'

        ]);

        $product = Products::find($request->input('product'));
        
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->barcode = $request->input('barcode');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->public_price = $request->input('public_price');
        $product->stock = $request->input('stock');
        $product->reviews = $request->input('reviews');
        $product->stars = $request->input('stars');
        $product->category_id = $request->input('category');
        $product->save();

        return Redirect::route('products');
    }

    public function add(Request $request){

        request()->validate([
            'name' => 'required',
            'barcode' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|url',
            'price' => 'required|numeric',
            'public_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'reviews' => 'required',
            'stars' => 'required|numeric|min:1|max:5',
            'category' => 'required|numeric'

        ]);

        $product = new Products();
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->barcode = $request->input('barcode');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->public_price = $request->input('public_price');
        $product->stock = $request->input('stock');
        $product->reviews = $request->input('reviews');
        $product->stars = $request->input('stars');
        $product->category_id = $request->input('category');
        $product->save();
        
        return Redirect::route('products');
    }
}
