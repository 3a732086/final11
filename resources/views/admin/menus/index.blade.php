@extends('admin.layouts.master')

@section('title', '菜單管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                餐點管理 <small>所有餐點列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 餐點管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('admin.menus.create') }}" class="btn btn-success">建立新餐點</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  style="text-align: center">餐點編號</th>
                        <th >餐點名稱</th>
                        <th  style="text-align: center">餐點內容</th>
                        <th  style="text-align: center">圖片位置(大)</th>
                        <th  style="text-align: center">圖片位置(小)</th>
                        <th  style="text-align: center">價格</th>
                        <th  style="text-align: center">餐點類別</th>
                        <th  style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td style="text-align: center">{{ $menu->id }}</td>
                            <td>{{$menu->name}}</td>
                            <td style="text-align: center">{{$menu->detail}}</td>
                            <td style="text-align: center">{{$menu->img}}</td>
                            <td style="text-align: center">{{$menu->img2}}</td>
                            <td style="text-align: center">{{$menu->price}}</td>
                            <td style="text-align: center">{{$menu->type}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.menus.edit', $menu->id) }}">編輯</a>

                                <form action="/admin/menus/{{$menu->id}}" method="POST" style="display:inline">
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
        {{$menus->links()}}
    </div>

    <!-- /.row -->
@endsection
