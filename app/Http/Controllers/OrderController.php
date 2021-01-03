<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $userID=auth()->user()->id;

        $orderdetails  = DB::table('orderdetails')
            ->join('products','orderdetails.products_id','=','products.id')
            ->join('orderlists','orderlists.id','=','orderdetails.orderlists_id')
            ->select('orderlists_id',DB::raw('group_concat(products.name," / ",quantity )as name'), 'orderlists.total','orderlists.method', 'orderlists.status','orderdetails.created_at' )
            ->where('orderlists.users_id',$userID)
            ->groupBy('orderlists_id','created_at')
            ->get();


        $data = [
            'orderdetails' => $orderdetails,
        ];

        return view('orders.index',$data);
    }
}
