@extends('layouts.masterFrontend')
@section('content')
    <div class="container">
    <div class="mb-4" style="margin-top: 20px; text-align: center">
        <h1 class="h3 mt-10 text-gray-800">
            Danh sách sản phẩm trong đơn hàng
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="font-weight: bold">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @if(isset($listProducts))
                @foreach($listProducts as $listProduct)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$listProduct->name}}</td>
                        <td>
                            <img src="{{asset(pare_url_file($listProduct->options->avatar))}}" alt="" style="width: 80px; height: 80px">
                        </td>
                        <td>
                            <input class="cart_quantity_input" type="number" min="1" name="quantity" value="{{$listProduct->qty}}" autocomplete="off" size="2">

                          <p data-price="{{number_format($listProduct->qty * $listProduct->price,0,',','.')}}" style="display: inline-block">


                          </p>


                        </td>
                        <td>
                            <ul>
                                @if($listProduct->options->sale > 0)
                                <li>Giá: {{number_format($listProduct->options->price_old,0,',','.')}} VND</li>
                                <li>Sale: {{$listProduct->options->sale}}%</li>
                                @else
                                <li>Giá: {{number_format($listProduct->options->price_old,0,',','.')}} VND</li>
                                @endif
                            </ul>
                        </td>
                        <td>{{number_format($listProduct->qty * $listProduct->price,0,',','.')}} VND</td>
                        <td>
                            <a href="{{route('delete.shopping.cart',$listProduct->rowId)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="text-right my-3">
            <h3 style="font-weight: 600; margin: 15px 0; text-align: right">Tổng tiền: {{$total}} VND</h3>
            <a href="{{route('get.home')}}" class="btn btn-success" style="background-color: #4700b3">Tiếp tục mua hàng</a>
            <a href="{{route('get.form.pay')}}" class="btn btn-success" style="background-color: #4700b3" >Thanh Toán</a>
        </div>

    </div>
    </div>

@endsection

