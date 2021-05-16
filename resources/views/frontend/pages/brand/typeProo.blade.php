@extends('layouts.masterFrontend')
@section('content')

    <div style="margin: 0 40px;">
        <div class="my-breadcrumb" style="z-index: 10;">
            <a href="{{route('get.home')}}"> <i class="fa fa-home"></i> Trang chủ</a>
            
            <a href="#"> <i class="fa fa-angle-right"></i> {{ $typePro->tp_name }}</a>
        </div>
        <div class="line-rating"></div>
        <div class="row">

        <div class="col-sm-12 col-md-10" style="margin: 0 auto;">
            <div class="product-site">
                <div class="container product-site-main-bottom">
                <h4 class="tab-content-item-sale__new" style="margin-top:20px; color: #ff6600">Sản phẩm thuộc {{$typePro->tp_name}}</h4>
                <div class="tab-content"> 
                    @foreach($products as $key => $val)
                        <?php
                        $price = $val->pr_price;
                        $sale = $val->pr_sale;
                        $price = $price - ($price * $sale)/100;
                        ?>
                        <a href="{{route('get.detail.store',[$val->pr_slug,$val->id])}}">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="display: inline-block; max-width: 270px">
                                <div class="tab-content-item">
                                    <div class="tab-content-item-avt">
                                        <img src="{{asset(pare_url_file($val->pr_img))}}" alt="" />
                                    </div>
                                    <div class="tab-content-item-txt" style="text-align: center;">
                                        @if($price != $val->pr_price)
                                            <div class="tab-content-item-txt__detail" >{{$val->pr_name}}</div>
                                            <div class="tab-content-item-txt__title">{{number_format($price,0,',','.')}} VND</div>
                                            <del style="color: #4d4d4d; font-size: 17px">{{number_format($val->pr_price,0,',','.')}} VND</del>&nbsp;
                                            
                                        @else
                                            <div class="tab-content-item-txt__title">{{$price}} VND</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>

                   @endforeach
                </div>
                {{$products->links()}}
                </div>
            </div>
        </div>
        </div>
    </div>
        
            

@endsection
