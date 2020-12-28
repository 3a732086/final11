@extends('admin.layouts.master')

@section('title', '會員管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                會員管理 <small>所有會員列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 會員管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <!--<a href="#" class="btn btn-success">建立新文章</a>-->
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  style="text-align: center">會員編號</th>
                        <th >會員姓名</th>
                        <th  style="text-align: center">帳號</th>
                        <th  style="text-align: center">密碼</th>
                        <th  style="text-align: center">email</th>
                        <th  style="text-align: center">住址</th>
                        <th  style="text-align: center">手機</th>
                        <th style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td style="text-align: center">{{ $user->id }}</td>
                            <td>{{$user->name}}</td>
                            <td style="text-align: center">{{$user->account}}</td>
                            <td style="text-align: center">{{$user->password}}</td>
                            <td style="text-align: center">{{$user->email}}</td>
                            <td style="text-align: center">{{$user->address}}</td>
                            <td style="text-align: center">{{$user->telephone}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.members.edit', $user->id) }}">編輯</a>
                                /
                                <form action="/admin/members/{{$user->id}}" method="POST" style="display:inline">
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
    </div>
    <!-- /.row -->
@endsection
