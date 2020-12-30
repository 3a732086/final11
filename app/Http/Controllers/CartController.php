<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $userid=auth()->user()->id;

        $results = DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->join('users','carts.users_id', '=', 'users.id')
            ->where('carts.users_id',$userid)
            ->select('carts.id','products.name','products.detail','products.price','products.img2','carts.quantity')
            ->get();

        $data = [
            'results' => $results,
        ];

        return view('carts.index',$data);
    }

    static public function total()
    {
        $userid=auth()->user()->id;

        $totals = DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->where('carts.users_id',$userid)
            ->select('products.name','products.price','carts.quantity')
            ->get();

        $count =  DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->where('carts.users_id',$userid)
            ->select('products.name','products.price','carts.quantity')
            ->count();

        $total = 0;
        for($i=0;$i<$count;$i++)
        {
            $price = $totals[$i]->price;
            $quantity = $totals[$i]->quantity;

            $total += $price * $quantity;
        }

        return $total;
    }


    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('carts.index');
    }

    static public function cartItem() //顯示導覽列購物車內產品數量
    {
        if (isset(auth()->user()->id))
        {
            $userID = auth()->user()->id;
            return Cart::where('users_id', $userID)->count();
        }
    }

}
