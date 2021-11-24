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

        \MercadoPago\SDK::setAccessToken(config('mercadopago.ACCESS_TOKEN'));

        // Crea un objeto de preferencia
        $preference = new \MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new \MercadoPago\Item();
        $item->title = $product->name;
        $item->quantity = 1;
        $item->currency_id = "MXN";
        $item->unit_price = $product->public_price;

        $preference->items = array($item);
        
        $preference->back_urls = array(
            "success" => asset('/success'),
            "failure" => asset('/failure'),
            "pending" => asset('/pending')
        );
        $preference->auto_return = "approved";
        
        $preference->save();

        return Inertia::render('Frontend/Products/Show', [
            'product' => new ProductResource($product),
            'preference_id' => $preference->id,
        ]);
    }

}
