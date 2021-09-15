<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(){
        return Inertia::render('Products/Show', [
            'products' => Products::all()
        ]);
    }
}
