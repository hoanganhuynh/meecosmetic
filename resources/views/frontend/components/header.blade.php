<div class="navbars">
    <!-- Nav pc -->
    <form action="{{route('get.list.store_search')}}">
        <nav class="navbars-pc">
            <ul class="navbars__list">
                <li class="navbars__link logo-box">
                    <a href="{{route('get.home')}}">
                        <img
                            src="{{asset('frontend/Image/mee.svg')}}"
                            alt=""
                            class="logo"
                            style="height: 40px;"
                        />
                    </a>

                </li>
                <li class="navbars__link">
                    <div class="input-group navbars__input-group" style="width: 500px; ">
                        <input type="text" class="form-control" name="find_product" placeholder="Tìm kiếm..." />
                        <div class="input-group-append" >
                            <button class="btn btn-secondary input-group-append--px" type="submit" style="background-color: #4700b3">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbars__list navbars__list-right">
                @if(Auth::Check())
                    <li class="navbars__link mr-2"><span
                            style="color: #333333; font-weight: bold">{{\Auth::user()->name}}</span></li>
                    <li class=" navbars__link user-list"><a href="">
                            <div class="dropdown show dropleft">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle" style="color: #333333;"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                                    <a class="dropdown-item" href="{{route('post.logout.user')}}">Thoát</a>
                                </div>
                            </div>
                    </li>
                @else
                    <li class="navbars__link user-list">
                        <a class=" btn btn-dark " style="background-color: #4700b3" href="{{route('get.register')}}">
                            Đăng ký
                        </a>
                    </li>
                    <li class="navbars__link user-list">
                        <a class="btn btn-dark " style="background-color: #4700b3" href="{{route('get.login')}}">
                            Đăng Nhập
                        </a>
                    </li>
                @endif
                <li class="user-list header__cart">
                    <div class="header__cart-wrap">
                        <i class="header__cart-icon fa fa-shopping-cart"></i>
                        <span class="header__cart-notice">{{\Cart::count()}}</span>
                        <!-- No cart header__cart-list--no-cart -->
                        <div class="header__cart-list {{(\Cart::count() == 0 ? 'header__cart-list--no-cart' : '')}}">

                            <span class="header__cart-list-msg">Chưa có sản phẩm</span>
                            <ul class="header__cart-list-item">
                                <!-- cart item -->
                                @if(isset($listProducts))
                                    @foreach($listProducts as $listProduct)
                                        <li class="header__cart-item">
                                            <img src="{{pare_url_file($listProduct->options->avatar)}}" alt=""
                                                 class="header__cart-item-img">
                                            <div class="header__cart-item-info">
                                                <div class="header__cart-item-head">
                                                    <h5 class="header__cart-item-name">{{$listProduct->name}}</h5>
                                                    <div class="header__cart-item-price-wrap">
                                                        <span class="header__cart-item-price">{{number_format($listProduct->price,0,',','.')}} VND</span>
                                                        <span class="header__cart-item-multiply">x</span>
                                                        <span class="header__cart-item-qnt">{{$listProduct->qty}}</span>
                                                    </div>
                                                </div>
                                                <div class="header__cart-item-body">
                                                        <span class="header__cart-item-desc">
                                                            Sale: {{$listProduct->options->sale}}%
                                                        </span>
                                                    <span class="header__cart-item-remove"><a
                                                            href="{{route('delete.shopping.cart',$listProduct->rowId)}}">Xóa</a></span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            @if(\Cart::count() > 0)
                                <a href="{{route('get.list.shopping.cart')}}"
                                   class="header__cart-view-cart btn btn-primary">Xem Giỏ Hàng</a>
                            @endif
                        </div>
                    </div>
                </li>

        </nav>
    </form>
    <label class="navbars__bars-btn" for="navbars-mobile-input">
        <i class="fas fa-bars icon-bars"></i>
    </label>
    <!-- checkbox -->
    <input type="checkbox" hidden class="navbars-input" id="navbars-mobile-input">
    <label class="navbars__overlay" for="navbars-mobile-input"></label>
    <!-- Nav mobile -->
    


</div>
