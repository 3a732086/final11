<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
        $userid = auth()->user()->id;

        //判斷資料表有無相同產品
        $count = DB::table('carts')
            ->select('carts.products_id')
            ->where('carts.users_id',$userid)
            ->where('carts.products_id',$request->products_id)
            ->count();

        //如有相同產品，抓資料表中原有的產品數量
        $quantity = DB::table('carts')
            ->select('carts.products_id','carts.quantity')
            ->where('carts.users_id',$userid)
            ->where('carts.products_id',$request->products_id)
            ->get();


        //抓購物車資料表的購物車編號
        $carts_id = DB::table('carts')
            ->where('carts.users_id',$userid)
            ->where('carts.products_id',$request->products_id)
            ->select('carts.id')
            ->get();

            if($count>=1)
            {
                $cart = Cart::find();
                $cart->quantity = $request->input('quantity');
                $cart->save();
                return redirect()->route('products.index');
            }
            else
            {
                $cart = new Cart();
                $cart->users_id = auth()->user()->id;
                $cart->products_id = $request->products_id;
                $cart->quantity = $request->input('quantity');
                $cart->save();
                return redirect()->route('products.index');
            }





    }


}
