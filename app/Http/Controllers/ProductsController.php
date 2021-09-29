<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $product = Products::find($request->input('product'));
        
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->barcode = $request->input('barcode');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->public_price = $request->input('public_price');
        $product->stock = $request->input('stock');
        $product->save();

        return back(303);
    }
}
