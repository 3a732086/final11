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
        $product = new Product();
        $product->name = $request->name;
        $product->detail = $request->detail;

        $img = $request->file('img');
        $img2 = $request->file('img2');
        $imgname =time().'.'.$img->getClientOriginalExtension();
        $imgname2 =time().'.'.$img2->getClientOriginalExtension();
        if($request->type == "個人餐")
        {
            $request->img->move(public_path('/img/個人/'), $imgname);
            $request->img2->move(public_path('/img/個人小張/'), $imgname2);
            $product->img = "img/個人/".$imgname;
            $product->img2 = "img/個人小張/".$imgname2;

        }
        elseif ($request->type == "多人餐")
        {

            $request->img->move(public_path('/img/多人/'), $imgname);
            $request->img2->move(public_path('/img/多人小張/'), $imgname2);
            $product->img = "img/多人/".$imgname;
            $product->img2 = "img/多人小張/".$imgname2;
        }
        elseif ($request->type == "單點")
        {
            $request->img->move(public_path('/img/單點/'), $imgname);
            $request->img2->move(public_path('/img/單點小張/'), $imgname2);
            $product->img = "img/單點/".$imgname;
            $product->img2 = "img/單點小張/".$imgname2;
        }
        $product->price = $request->price;
        $product->type = $request->type;

        $product->save();


        //Product::create($request->all());
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

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.menus.index');
    }
}
