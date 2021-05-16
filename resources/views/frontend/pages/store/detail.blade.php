@extends('layouts.masterFrontend')
@section('content')
        <div class="my-breadcrumb" style="z-index: 10;">
            <a href="{{route('get.home')}}" style="color: #a7a7a7;"> <i class="fa fa-home"></i> Trang chủ</a>
            <a href="{{route('get.list.product',[$brandProDetail->br_slug, $brandProDetail->id])}}" style="color: #a7a7a7;"> <i class="fa fa-angle-right"></i> {{ $brandProDetail->br_name }}</a>
            <a href="{{route('get.list.product.type',[$typeProDetail->tp_slug, $brandProDetail->id, $typeProDetail->id])}}" style="color: #a7a7a7;"> <i class="fa fa-angle-right"></i> {{ $typeProDetail->tp_name }}</a>
            <a href="#" style="color: #a7a7a7;"> <i class="fa fa-angle-right"></i> {{ $proDetails->pr_name }}</a>
        </div>
        <div style="margin: 0 50px; height: 1px; background: #ebe8e8"></div>
        <div class="product-detail">
            <div class="container">
                @if(isset($proDetails))
                <div class="row no-gutters">
                    <input type="hidden" id="lat_1" value={{$proDetails->st_lat}}  />
                    <input type="hidden" id="lng_1" value={{$proDetails->st_lng}}>
                    <div class="col-sm-12 col-md-5">
                        <div class="product-detail__img">
                            <img src="{{asset(pare_url_file($proDetails->pr_img))}}" alt="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="product-detail__main">
                            <div class="detail-branch" style="font-weight: 700; font-size: 14px;color:  #6f29b0;"><span>{{isset($brandProDetail->br_name) ? $brandProDetail->br_name : ''}} </span></div>
                            <div class="detail-content">
                                <h4 class="detail-content__txt">{{$proDetails->pr_name}}</h4>
                                <div class="line-rating"></div>
                                <div class="detail-content__rating">
                                    <?php

                                    $price = $proDetails->pr_price;
                                    $sale = $proDetails->pr_sale;
                                    $price_sale = ($price * $sale)/100;
                                    $price = $price - $price_sale;
                                    ?>
                                    <div class="detail-content-product"><a href="#cmt" style="text-decoration: none; color: #625d66">{{$total}}&nbsp<span>đánh giá</span></a>&nbsp&#124&nbsp</div>
                                    <div class="detail-content-product"><span>Mã sản phẩm:&nbsp</span> {{$proDetails->id}}</div>
                                </div>
                                <div class="line-rating"></div>
                                <div class="detail-content__cost" style="margin-top: 20px;">
                                    
                                    <span class="price-product" style="color: #8400ff">{{number_format($price,0,',','.')}} đ</span><span class="detail-content-product"> (Đã bao gồm VAT)</span>

                                </div>
                                <div>
                                    <span class="price-product detail-content-product" style="font-weight: normal; font-size: 1.1rem; margin-top: -5px;"><del>{{number_format($proDetails->pr_price,0,',','.')}} đ </del></span>&nbsp;&nbsp;</div>
                                <div style="color: #7a7a7a; margin-top: 7px;">
                                    <span style="font-size: 1.0rem">Tiết kiệm: {{number_format($price_sale,0,',','.')}} đ (<span style="color: red;">-{{$sale}}%</span>)</span>
                                </div>
                                <!-- <div class="detail-content__local">{{$proDetails->st_address}}</div> -->

                                <div>
                                    <div class="sale-for-product">Mua sản phẩm bất kỳ tặng 1 sữa rửa mặt 10ml (Đến hết 31/12/2020)</div>
                                </div>
                                
                                <div class="detail-content__open" style="margin: 7px 0;">
                                        <div class="col-sm-12 col-md-5">
                                            <span class="detail-content-product">{{$totalss}} sản phẩm có sẵn</span>
                                        </div>
                                    
                                    
                                </div>

                                <a href="{{ route('add.shopping.cart', [$proDetails->id]) }}">
                                    <div type="button" class="btn-add-product">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                        <span style="font-weight: 450; font-size: 17px;">Thêm vào giỏ hàng</span>
                                    </div>
                                </a>
                                
                                
                            </div>
                        </div>
                    </div>

                </div>
                    @endif

                <div class="row no-gutters info-product">
                    <div style="color: #4d0099;"><h4>Thông tin sản phẩm</h4></div>
                    <div class="line-rating"></div> 
                    <div>
                        <div class="title-desc-product "><span>Sơ lược về thương hiệu {{$brandProDetail->br_name}}:</span></div>
                        <div class="desc-product">{{$brandProDetail->br_desc}}</div>
                    </div>

                    <div>
                        <div class="title-desc-product"><span>{{$proDetails->pr_name}}:</span></div>
                        <div class="desc-product">{{$proDetails->pr_desc}}</div>
                    </div>

                    <div style="width: 100%;">
                        <img src="{{asset(pare_url_file($proDetails->pr_img))}}" alt="" class="img-detail-product">
                    </div>

                    <div>
                        <div class="title-desc-product"><span>Thành phần:</span></div>
                        <div class="desc-product">{{$proDetails->pr_ingredent}}</div>
                    </div>

                    <div style="width: 100%;">
                        <img src="{{asset(pare_url_file($proDetails->pr_img1))}}" alt="" class="img-detail-product">
                    </div>

                    <div>
                        <div class="title-desc-product"><span>Công dụng:</span></div>
                        <div class="desc-product">{{$proDetails->pr_uses}}</div>
                    </div>

                    <div style="width: 100%;">
                        <img src="{{asset(pare_url_file($proDetails->pr_img))}}" alt="" class="img-detail-product">
                    </div>

                    <div>
                        <div class="title-desc-product"><span>Hướng dẫn sử dụng:</span></div>
                        <div class="desc-product">{{$proDetails->pr_instruction_for_use}}</div>
                    </div>
                </div>

                <div class="row no-gutters info-product" id="cmt">
                    <div class="title-desc-product" style="margin-top:0;" >Đánh giá:</div>
                    <div class="line-rating"></div>
                   <form action="{{route('get.comment.store',$proDetails->id)}}" method="POST" style="width: 100%;" >
                   {{ csrf_field() }}
                   <div class="form-rating rating-comment-send">
                        <textarea name="c_comment"  cols="60" rows="3" style="resize: none; border-radius: 6px; font-size: 18px; padding: 8px"></textarea>
                        <button type="submit" class=" btn btn-success"  style="margin-left: 40px; background-color: #4700b3" >Gửi đánh giá</a>
                    </div>
                   <div>
                   
                   </div>
                   </form>
                
                    <div class="rating-comment-show" id="comment-show" style="display: block; width: 100%;">
                        <div class="title-desc-product" >Đánh giá của sản phẩm: <span style="color: #00972a;">{{$proDetails->pr_name}}</span></div>

                        @if(isset($comments))
                            @foreach($comments as $comments)
                        <div class="rating-comment-content my-3">
                            <h6 class="rating-comment-title">{{$comments->getUserComment->name}}</h6>
                            <div class="rating-comment-txt d-flex">
                                {{$comments->c_comment}}
                            </div>
                            <div class="rating-comment-date"><a href="" class="mr-3">Trả lời</a><span>{{date('d/m/Y H:i',strtotime($comments->created_at))}}</span></div>
                        </div>
                        <div class="line-rating"></div>
                        @endforeach
                        @endif
                      
                    </div>
                </div>

                <div class="row no-gutters info-product">
                    <div>
                        <div class="title-desc-product" style="margin-top:0;"><span>Giới thiệu về MeeCosmetic:</span></div>
                        <div class="desc-product">Đẹp - Là một từ mà mọi người đều khát khao cả nam lẫn nữ. Đẹp đi đôi với khỏe mạnh, đẹp đi đôi với sự lựa chọn thông minh. Đẹp toát ra từ vẻ ngoài tươi tắn tràn đầy năng lượng sống. 
                            Chính vì vậy sức khỏe và làm đẹp ngày càng được nhiều người quan để hướng đến cuộc sống tươi vui, hạnh phúc hơn. 
                            Sức khỏe tốt được biểu hiện qua làn da hồng hào,mịn màng, vóc dáng cân đối, mái tóc bồng bềnh và hàm răng chắc khỏe. 
                            Thấu hiểu nhu cầu đó, các hãng mỹ phẩm không ngừng nghiên cứu và cho ra đời hàng nghìn loại mỹ phẩm làm đẹp đa dạng chủng loại. 
                            Nhiều nhóm hàng mỹ phẩm bao gồm chăm sóc da, chăm sóc tóc, chăm sóc toàn thân, chăm sóc cá nhân, nước hoa lần lượt ra đời và đa dạng hóa để đáp ứng nhu cầu làm đẹp của con người.
                            Chăm sóc da mặt là một quá trình công phu gồm nhiều bước như sữa rửa mặt, nước hoa hồng, serum, sữa dưỡng, và kem , là sự tự thưởng cho bản thân, 
                            và tất nhiên kết quả gặt được sau một quá trình kiên trì là 1 làn da đẹp mỹ mãn. Còn Trang điểm là một phép màu, mọi người ví thợ trang điểm là 1 nhà phù thủy giúp các cô gái trở nên xinh đẹp tức thì. 
                            Bạn có thể dùng son môi, phấn má hồng, phấn nền để trang điểm khi đi làm, dự tiệc để trở nên thu hút. Ngoài ra bạn cũng nên dùng kem trắng da, sữa dưỡng thể để chăm sóc toàn thân, cũng như chọn lựa dầu gội đầu phù hợp để dưỡng tóc hằng ngày. 
                            Ngoài ra, một vóc dáng khỏe đẹp hoàn hảo còn cần sự giúp sức của nhóm hàng chăm sóc cá nhân như kem đánh răng, dung dịch vệ sinh và tăng cường sức khỏe như thực phẩm chức năng, viên uống vitamin.
                            <br>
                            MeeCosmetic luôn tôn trọng khách hàng, lấy niềm vui, sự hài lòng của khách hàng để làm động lực, không ngừng tìm kiếm các sản phẩm tốt nhất để mỗi khách hàng đều có thể trở nên tự tin và xinh đẹp hơn. 
                            Các hãng thương hiệu mỹ phẩm ở MeeCosmetic luôn là các thương hiệu uy tín, được mọi người tin dùng như : Secret Key, Laneige, Vichy, Avène, Yves Rocher, Laroche Posay, Lancôme,...
                            Bên cạnh đó khi mua hàng ở MeeCosmetic, khách luôn được giá ưu đãi tốt nhất, dịch vụ nhanh chóng & nhiều chương trình Khuyến Mãi khác.</div>
                    </div>
                </div>
                
            </div>

            



           
        </div>

        
  




@endsection
