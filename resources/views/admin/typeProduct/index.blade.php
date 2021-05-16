@extends('layouts.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Loại sản phẩm
        </h1>
        <a href="{{route('admin.create.typeProduct')}}" class="btn btn-success pull-right">Thêm loại sản phẩm</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên loại sản phẩm</th>
                <th>Mô tả</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($typeProducts))
                @foreach($typeProducts as $typeProduct)
                    <tr>
                        <td>{{$typeProduct->id}}</td>
                        <td>{{$typeProduct->tp_name}}</td>
                        <td>{{$typeProduct->tp_desc}}</td>
                        <td>
                            <a href="{{route('admin.update.typeProduct',$typeProduct->id)}}" class="btn btn-success">Sửa</a>
                            <a href="{{route('admin.delete.typeProduct',['delete',$typeProduct->id])}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
