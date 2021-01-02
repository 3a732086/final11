@extends('admin.layouts.master')

@section('title', '訂單管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                訂單管理 <small>所有訂單列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">

        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  style="text-align: center">訂單編號</th>
                        <th >會員編號</th>
                        <th  style="text-align: center">餐點名稱/數量</th>
                        <th  style="text-align: center">總金額</th>
                        <th  style="text-align: center">訂單狀態</th>
                        <th  style="text-align: center">方法</th>
                        <th  style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderlists as $orderlist)
                        <tr>
                            <td style="text-align: center">{{ $orderlist->orderlists_id }}</td>
                            <td>{{$orderlist->users_id}}</td>
                            <td style="text-align: center">{{$orderlist->name}}</td>
                            <td style="text-align: center">{{$orderlist->total}}</td>
                            <td style="text-align: center">{{$orderlist->status}}</td>
                            <td style="text-align: center">{{$orderlist->method}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.orderlists.edit', $orderlist->orderlists_id) }}">編輯</a>

                                <form action="/admin/orderlists/{{$orderlist->orderlists_id}}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('是否確認刪除')">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$orderlists->links()}}
    </div>

    <!-- /.row -->
@endsection
