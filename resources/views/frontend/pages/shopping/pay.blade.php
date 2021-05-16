@extends('layouts.masterFrontend')
@section('content')

    <div class="my-breadcrumb" style="z-index: 10;">
        <a href="{{route('get.home')}}" style="color: #a7a7a7;"> <i class="fa fa-home"></i> Trang chủ</a>
        <a href="{{route('get.list.shopping.cart')}}" style="color: #a7a7a7;"> <i class="fa fa-angle-right"></i> Giỏ hàng</a>
        <a href="#" style="color: #a7a7a7;"> <i class="fa fa-angle-right"></i> Thanh toán</a>
    </div>
    <div class="line-rating"></div>
    <div class=" container-fluid my-5 ">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow-lg " style="padding: 30px;">
                    
                    <div class="row justify-content-around mb-4">
                        <div class="col-md-7">
                        <h2 class="text-center mt-3" style="margin-bottom: 20px; color: #4700b3; font-weight: 700;">THÔNG TIN THANH TOÁN</h2>
                            <div class="card border-0">
                                

                                <form action="" method="POST">
                                    @csrf
                                <div class="card-body">
                                    <p style="font-size: 20px; color:#ff0000; font-weight: 600;">Tổng đơn hàng: {{$total}} VND</p>
                                    <hr class="my-0">
                                    <div class="form-group">
                                        <label class="small text-muted mb-1">Địa chỉ</label>
                                        <input type="text" style="height: 40px; font-size: 16px;" class="form-control form-control-sm" name="address" placeholder="Địa chỉ" >
                                    </div>
                                    <div class="form-group">
                                        <label class="small text-muted mb-1">Email</label>
                                        <input type="email" style="height: 40px; font-size: 16px;" class="form-control form-control-sm" name="email" placeholder="Email" value="{{get_data_user('web','email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="small text-muted mb-1">Số điện thoại</label>
                                        <input type="text" style="height: 40px; font-size: 16px;" class="form-control form-control-sm" name="phone" placeholder="Số điện thoại" value="{{get_data_user('web','phone')}}">
                                    </div>
                                    
                                    <div class="row mb-5 mt-4 ">
                                        <div class="col-md-7 col-lg-6 mx-auto" style="text-align: center;"><button type="submit" class="btn-add-product" style="font-weight: 450; font-size: 17px; width: 200px">Xác nhận</button></div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

