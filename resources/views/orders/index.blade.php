@extends('layouts.master')

@section('title','訂單查詢')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">訂單查詢
            <small></small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home.index')}}">首頁</a>
            </li>
            <li class="breadcrumb-item active">訂單查詢</li>
        </ol>

        @foreach($as as $a)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                                <p class="card-text"><b>訂餐時間</b> {{$a->created_at}}</p>
                                <p class="card-text"><b>預計取餐時間</b> {{$a->created_at}}</p>
                                <p class="card-text"><b>餐點名稱/數量</b>/{{$a->quantity}}</p>
                                <p class="card-text"><b>訂單金額</b> </p>
                                <p class="card-text"><b>訂單方式</b> </p>
                                <p class="card-text"><b>訂單狀態</b> </p>

                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        </div>
    </div>


@endsection
