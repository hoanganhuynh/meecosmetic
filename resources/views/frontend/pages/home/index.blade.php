@extends('layouts.masterFrontend')
@section('content')

    <div style="margin: 0 40px;">
        <div class="my-breadcrumb" style="z-index: 10;">
            <a href="{{route('get.home')}}" > <i class="fa fa-home"></i> Trang chủ</a>
        </div>
        <div class="line-rating"></div>
        <div class="row">
        <div class="col-sm-12 col-md-2">
                  <div class="sidebar" style="margin: 40px 0;">
                  <p style="font-size: 16px; font-weight: 700;">THƯƠNG HIỆU</p>
                  <ul class="nav flex-column nav-pills">
                        @foreach($brands as $count => $brand)
                            <li class="item-link myset">
                                <a class="nav-link  "  
                                   href="{{ route('get.list.product',[$brand->br_slug, $brand->id]) }}" 
                                   aria-selected="true"  style="color: black;">
                                {{$brand->br_name}}
                                </a>
                                <div class="line-rating" style="background: #fee9ff"></div> 
                            </li>
                        @endforeach
                        
                    </ul>
                    <p style="font-size: 16px; font-weight: 700; margin-top: 40px">LOẠI SẢN PHẨM</p>
                  <ul class="nav flex-column nav-pills">
                        @foreach($typeProducts as $count => $typePro)
                            <li class="item-link myset">
                                <a class="nav-link"  
                                   href="{{ route('get.list.product.typePro',[$typePro->tp_slug, $typePro->id]) }}" 
                                   aria-selected="true"  style="color: black;">
                                {{$typePro->tp_name}}
                                </a>
                                <div class="line-rating" style="background: #fee9ff"></div> 
                            </li>
                        @endforeach
                        
                    </ul>
                  </div>

        </div>

        <div class="col-sm-12 col-md-10">
            <div class="product-site">
                <div class="container product-site-main-bottom">
                <h4 class="tab-content-item-sale__new" style="margin-top:20px; color: #ff6600">Sản phẩm mới nhất</h4>
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
