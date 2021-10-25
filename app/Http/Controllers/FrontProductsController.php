<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontProductsController extends Controller
{
    public function show(){
        return Inertia::render('Frontend/Products/Show', [
            'products' => Products::with('variants')
                       ->with('provider')
                       ->with('category')
                       ->orderBy('id', 'desc')
                       ->paginate(10)
        ]);
    }
}
