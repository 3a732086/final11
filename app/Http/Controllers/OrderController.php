<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $userid=auth()->user()->id;

        $results = DB::table('orderlists')
            ->join('products','orderlists.products_id','=','products.id')
            ->where('orderlists.users_id',$userid)
            ->select('orderlists.created_at','total','quantity','products.name','status','method')
            ->get();

        $as = DB::table('orderlists')
            ->select(DB::raw('GROUP_CONCAT(products_id) as products_id ,GROUP_CONCAT(quantity) as quantity '),'created_at')
            ->groupBy('created_at')
            ->get();

        $data = [
            'results' => $results,
            'as' => $as,
        ];

        return view('orders.index',$data);
    }
}
