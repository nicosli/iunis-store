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
}
