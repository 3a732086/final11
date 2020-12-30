@extends('layouts.master')

@section('title','購物車')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">購物車
            <small></small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('products.index')}}">菜單</a>
            </li>
            <li class="breadcrumb-item active">購物車</li>
        </ol>

        <!-- Blog Post -->
        @foreach($results as $item)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">

                    <div class="flex">
                        <img class="img-fluid" src="{{asset($item->img2)}}">
                    </div>


                    <div class="flex">
                        <h2><p class="card-text">{{$item->name}}</p></h2>
                        <p class="card-text">{{$item->detail}}</p>
                    </div>

                    <div class="flex">
                        <p class="card-text">數量：{{$item->quantity}}</p>
                        <p class="card-text">${{($item->quantity)*($item->price)}}</p>
                    </div>


                    <div class="flex">
                        <a href="#" class="btn btn-primary">刪除餐點 &rarr;</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach



        <!-- Pagination -->

    </div>
    <!-- /.container -->

@endsection
