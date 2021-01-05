@extends('admin.layouts.master')

@section('title', '編輯訂單')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯訂單 <small>編輯訂單內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
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

            @foreach($orderlist as $ordlis)


                    <form action="/admin/orderlists/{{$ordlis->orderlists_id}}" method="POST" role="form">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="id">訂單編號：</label>
                        <input name="id" class="form-control" readonly="readonly" value="{{old('id',$ordlis->orderlists_id)}}">
                    </div>

                    <div class="form-group">
                        <label for="users_id">會員編號：</label>
                        <input name="users_id" name="users_id" class="form-control" readonly="readonly" value="{{old('users_id',$ordlis->users_id)}}">
                    </div>

                    <div class="form-group">
                        <label for="products_id">產品名稱/數量：</label>
                        <input id="products_id" name="products_id" class="form-control"  rows="10"  value="{{old('products_id',$ordlis->name)}}">
                    </div>

                    <div class="form-group">
                        <label for="total">總金額：</label>
                        <input id="total" name="total" class="form-control"  value="{{old('total',$ordlis->total)}}">
                    </div>

                    <div class="form-group">
                        <label for="status">訂單狀態：</label>
                        <select name="status" id="status">{{old('status',$ordlis->status)}}
                            <option value="準備中">準備中</option>
                            <option value="已完成">已完成</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="method">方法：</label>
                        <select name="method" id="method">{{old('method',$ordlis->method)}}
                            <option value="預定快取">預定快取</option>
                            <option value="外送">外送</option>
                        </select>

                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-success">更新</button>
                    </div>
                    </form>

            @endforeach




            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection
