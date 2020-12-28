<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $userid=auth()->user()->id;

        $results = DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->join('users','carts.users_id', '=', 'users.id')
            ->where('carts.users_id',$userid)
            ->select('users.id','products.name','products.detail','products.price','carts.quantity')
            ->get();

        $data = [
            'results' => $results,
        ];
        return view('carts.index',$data);

    }
}
