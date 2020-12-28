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

    public function edit($id)
    {
        $product = Product::find($id);
        $data = ['product' => $product];

        return view('admin.menus.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->update($request->all());
        return redirect()->route('admin.menus.index');
    }
}
