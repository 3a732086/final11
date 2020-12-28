<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('type','ASC')->paginate(6);

        $data = [
            'products' => $products,
        ];
        return view('products.index',$data);
    }


    public function show(Product $product)
    {
        //$product = Product::find($id);
        $data = [
            'product' => $product,
        ];
        return view('products.show', $data);
    }

    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->users_id = auth()->user()->id;
        $cart->products_id = $request->products_id;
        $cart->quantity = $request->input('quantity');
        $cart->save();
        return redirect()->route('products.index');
    }

    static public function cartItem()
    {
        //  return auth()->user()->carts()->get();
//        $userID = auth()->user()->id;
//        $Item = Cart::where('users_id',$userID)->count();
//        return view('layout.partials.navigation',$Item);
    }
}
