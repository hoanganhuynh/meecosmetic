@extends('layouts.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Quản lý đánh giá
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Tên sản phẩm</th>
                <th>Nội dung</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($comments))
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{isset($comment->getUserComment->name) ? $comment->getUserComment->name : '[N\A]'}}</td>
                        <td>{{isset($comment->getProductComment->pr_name) ? $comment->getProductComment->pr_name : '[N\A]'}}</td>
                        <td>{{$comment->c_comment}}</td>
                        <td >
                            <a href="{{route('admin.delete.comment',['delete',$comment->id])}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
@endsection
