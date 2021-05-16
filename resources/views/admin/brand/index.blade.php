@extends('layouts.master')
@section('content')
    <div class="page-header">
    
        <nav aria-label="breadcrumb">
           
                
            
        </nav>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Quản lý thương hiệu
        </h1>
        <a href="{{route('admin.create.brand')}}" class="btn btn-success pull-right">Thêm thương hiệu</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên thương hiệu</th>
                <th>Xuất xứ thương hiệu</th>
                <th style="width: 800px;">Mô tả thương hiệu</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @if(isset($brands))
                <?php ?>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$brand->br_name}}</td>
                        <td>{{$brand->br_origin}}</td>
                        <td>{{$brand->br_desc}}</td>
                        
                        <td>
                        <a href="{{route('admin.update.brand',$brand->id)}}" class="btn btn-success">Sửa</a>
                            <a  href="{{route('admin.delete.brand',['delete',$brand->id])}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
