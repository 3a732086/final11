<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = Product::orderBy('type','ASC')->paginate(12);
        $data = [
            'menus' => $menus

        ];
        return view('admin.menus.index',$data);
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('admin.menus.index');
    }
}
