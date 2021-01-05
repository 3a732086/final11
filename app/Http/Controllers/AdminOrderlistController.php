<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use App\Models\Orderlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderlistController extends Controller
{
    public function index()
    {

        $orderlists  = DB::table('orderdetails')
            ->join('products','orderdetails.products_id','=','products.id')
            ->join('orderlists','orderlists.id','=','orderdetails.orderlists_id')
            ->join('users','orderlists.users_id','users.id')
            ->select('orderdetails.orderlists_id','users_id',DB::raw('group_concat(products.name," / ",quantity )as name'), 'orderlists.total','orderlists.method', 'orderlists.status','orderdetails.created_at' )
            ->groupBy('orderlists_id','created_at')
            ->orderBy('orderlists.status','DESC')
            ->paginate(10);
        //$orderlists = Orderlist::orderBy('created_at','ASC')->paginate(10);
        $data = [
            'orderlists' => $orderlists

        ];
        return view('admin.orderlists.index',$data);
    }

    public function edit($id)
    {

        $orderlist  = DB::table('orderdetails')
            ->join('products','orderdetails.products_id','=','products.id')
            ->join('orderlists','orderlists.id','=','orderdetails.orderlists_id')
            ->join('users','orderlists.users_id','users.id')
            ->select('orderdetails.orderlists_id','users_id',DB::raw('group_concat(products.name," / ",quantity )as name'), 'orderlists.total','orderlists.method', 'orderlists.status','orderdetails.created_at' )
            ->where('orderlists.id',$id)
            ->groupBy('orderlists_id','created_at')
            ->get();


        //$orderlist = Orderlist::find($id);
        $data = ['orderlist' =>  $orderlist];

        return view('admin.orderlists.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $Orderlist = Orderlist::find($id);
        $Orderlist->update($request->all());
        return redirect()->route('admin.orderlists.index');
    }

    public function destroy($id)
    {
        Orderlist::destroy($id);
        return redirect()->route('admin.orderlists.index');
    }
}
