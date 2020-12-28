@extends('admin.layouts.master')

@section('title', '編輯會員資料')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                修改會員 <small>修改會員資料</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 會員管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form action="/admin/members/{{$user->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">會員姓名：</label>
                    <input name="name" class="form-control"  value="{{old('name',$user->name)}}">
                </div>

                <div class="form-group">
                    <label for="account">帳號：</label>
                    <input name="account" class="form-control" readonly="readonly" value="{{old('account',$user->account)}}">
                </div>

                <div class="form-group">
                    <label for="password">密碼：</label>
                    <input name="password" class="form-control" value="{{old('password',$user->password)}}">
                </div>

                <div class="form-group">
                    <label for="email">email：</label>
                    <input name="email" class="form-control"  value="{{old('email',$user->email)}}">
                </div>

                <div class="form-group">
                    <label for="address">住址：</label>
                    <input name="address" class="form-control"  value="{{old('address',$user->address)}}">
                </div>

                <div class="form-group">
                    <label for="telephone">手機：</label>
                    <input name="telephone" class="form-control"  value="{{old('telephone',$user->telephone)}}">
                </div>


                <div class="text-right">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>

            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection
