<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $userid=auth()->user()->id;

        $ordercounts = DB::table('orderlists')
            ->where('users_id',$userid)
            ->get();

        $orderdetails = DB::table('orderdetails')
            ->join('products','orderdetails.products_id','=','products.id')
            ->join('orderlists','orderlists.id','=','orderdetails.orderlists_id')
            ->select('products.name','quantity')
            ->get();


        $data = [
            'ordercounts' => $ordercounts,
            'orderdetails' => $orderdetails,
        ];

        return view('orders.index',$data);
    }
}
