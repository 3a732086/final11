@extends('admin.layouts.master')

@section('title', '編輯餐點')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯餐點 <small>編輯餐點內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 餐點管理
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
            <form action="/admin/menus/{{$product->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">餐點名稱：</label>
                    <input name="name" class="form-control" value="{{old('title',$product->name)}}">
                </div>

                <div class="form-group">
                    <label for="detail">餐點內容：</label>
                    <textarea id="detail" name="detail" class="form-control" rows="10">{{old('detail',$product->detail)}}</textarea>
                </div>

                <div class="form-group">
                    <label for="img">圖片位置(大)：</label>
                    <input id=img" name="img" class="form-control" rows="10"  value="{{old('img',$product->img)}}">
                </div>

                <div class="form-group">
                    <label for="img2">圖片位置(小)：</label>
                    <input id="img2" name="img2" class="form-control"  value="{{old('img2',$product->img2)}}">
                </div>

                <div class="form-group">
                    <label for="price">價格：</label>
                    <input id="price" name="price" class="form-control"  value="{{old('price',$product->price)}}">
                </div>

                <div class="form-group">
                    <label for="type">餐點類別：</label>
                    <select name="type" id="type">{{old('type',$product->type)}}
                        <option value="單人餐">單人餐</option>
                        <option value="多人餐">多人餐</option>
                        <option value="單點">單點</option>
                    </select>

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
