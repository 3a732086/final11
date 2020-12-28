<?php

namespace App\Http\Controllers;

use App\Models\Orderlist;
use Illuminate\Http\Request;

class AdminOrderlistController extends Controller
{
    public function index()
    {
        $orderlists = Orderlist::orderBy('created_at','ASC')->paginate(10);
        $data = [
            'orderlists' => $orderlists

        ];
        return view('admin.orderlists.index',$data);
    }

    public function edit($id)
    {
        $orderlist = Orderlist::find($id);
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
