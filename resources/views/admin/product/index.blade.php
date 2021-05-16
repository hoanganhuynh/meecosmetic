@extends('layouts.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Quản lý sản phẩm
        </h1>
        <a href="{{route('admin.create.product')}}" class="btn btn-success pull-right">Thêm sản phẩm</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Thương hiệu</th>
                <th>Công dụng</th>
                <th>Thành phần</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($products))
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$product->pr_name}}
                            
                        </td>
                        <td>
                            <ul style="padding-left: 0px; list-style-type: none">
                                <li>{{number_format($product->pr_price,0, ',','.')}} VND</li>
                                <li>Sale: {{$product->pr_sale}} %</li>  
                            </ul>
                            
                        </td>
                        {{--                        Reletionship--}}
                        <td>{{$product->relation_store->br_name ? $product->relation_store->br_name : '[N\A]'}}</td>
                        <!-- <td><img src="{{pare_url_file($product->pro_avatar)}}" alt="" width="80px" height="80px"></td> -->
                        <td>{{$product->pr_uses}}</td>
                        <td>{{$product->pr_ingredent}}</td>
                        <td >
                            <a href="{{route('admin.update.product',$product->id)}}" class="btn btn-success mr-1">Sửa</a>
                            <a style="margin-top: 5px" href="{{route('admin.action.product',['delete',$product->id])}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
