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
}
