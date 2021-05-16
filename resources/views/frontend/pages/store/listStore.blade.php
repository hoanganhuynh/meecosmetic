@extends('layouts.masterFrontend')
@section('content')
    <!-- Product - item -->
    {{--    @include('frontend.components.slider')--}}

    <div class="product-site">
        <div class="container product-site-main-bottom">
            <div class="tab-content" id="nav-tabContent">
                @if(isset($proSearch))
                    <h4 class="my-3 text-danger">Kết quả tìm được {{count($proSearch)}} sản phẩm  </h4>
                    <div class="row no-gutters">
                        @foreach($proSearch as $key => $val)
                       
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
                @endif
            </div>
        </div>
    </div>
@endsection
