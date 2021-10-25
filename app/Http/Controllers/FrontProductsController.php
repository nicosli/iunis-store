<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class FrontProductsController extends Controller
{
    public function list(){
        return Inertia::render('Frontend/Products/List', [
            'products' => ProductResource::collection(Products::orderBy('id', 'desc')->paginate(10))
        ]);
    }

    public function show($hashProduct){
        $product = Products::byHashOrFail($hashProduct);
        return Inertia::render('Frontend/Products/Show', [
            'product' => new ProductResource($product)
        ]);
    }
}
