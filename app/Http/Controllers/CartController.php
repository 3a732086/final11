<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orderdetail;
use App\Models\Orderlist;
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


    public function store(Request $request)
    {
        $userID = auth()->user()->id;

        $totals = DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->where('carts.users_id',$userID)
            ->select('products.name','products.price','carts.quantity')
            ->get();

        $count =  DB::table('carts')
            ->join('products','carts.products_id','=','products.id')
            ->where('carts.users_id',$userID)
            ->select('products.name','products.price','carts.quantity')
            ->count();


        $total = 0;

        for($i=0;$i<$count;$i++)
        {
            $price = $totals[$i]->price;
            $quantity = $totals[$i]->quantity;
            $total += $price * $quantity;
        }

            //將購物車資料存到訂單主檔
            $order = new Orderlist();
            $order->users_id = $userID;
            $order->total = $total;
            $order->method = "預定快取";
            $order->status = "準備中";
            $order->save();

            $allorderlists2 = DB::table('products')
                ->join('carts','carts.products_id' ,'=','products.id')
                ->join('orderlists','orderlists.users_id','=','carts.users_id')
                ->where('carts.users_id',$userID)
                ->where('status' , '準備中')
                ->select('orderlists.id','carts.products_id','carts.quantity','products.price','orderlists.status','orderlists.total')
                ->get();

            $allorderlists = DB::table('products')
                ->join('carts','carts.products_id' ,'=','products.id')
                ->join('orderlists','orderlists.users_id','=','carts.users_id')
                ->where('carts.users_id',$userID)
                ->where('status' , '準備中')
                ->select('orderlists.id','carts.products_id','carts.quantity','products.price','orderlists.status','orderlists.total')
                ->count();



             $j = 0;

             for($j=0;$j<$count;$j++)
             {
                $orderlists_id = $allorderlists2[$j]->id;
                $products_id = $allorderlists2[$j]->products_id;
                $products_price =$allorderlists2[$j]->price;
                $carts_quantity = $allorderlists2[$j]->quantity;

                $detail = new Orderdetail();
                $detail->orderlists_id = $orderlists_id;
                $detail->products_id =  $products_id;
                $detail->quantity = $carts_quantity;
                $detail->price = $products_price;
                $detail->save();

                Cart::where('users_id',$userID)->delete();
             }


        return redirect()->route('products.index');
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
