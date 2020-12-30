@extends('layouts.master')

@section('title','菜單資訊')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$product->name}}
            <small>-{{$product->type}}</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('products.index')}}">菜單</a>
            </li>
            <li class="breadcrumb-item active">菜單資訊</li>
        </ol>

        <!-- Portfolio Item Row -->

        <div class="row">
            <div class="col-md-8">
                <img class="img-fluid" src="{{asset($product->img)}}">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">{{$product->detail}}</h3>
                <br><br>
                <h2 class="my-2">${{$product->price}}</h2>
                <br><br>
                <form action="{{route('products.store')}}" method="post" role="form">
                    @method('post')
                    @csrf
                    <label for="quantity">數量:</label>
                    <select id="quantity" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <br><br>
                    <input type="hidden" name="products_id" value="{{$product->id}}">
                    <button type="submit"  onclick="return confirm('是否確認加入購物車?')" class="btn btn-sm btn-primary" style="height: 50px;width: 200px">加入購物車</button>
                </form>
            </div>
        </div>

        <!-- /.row -->
@endsection
