<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MeeCosmetic</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    @yield('css')--}}
    {{--    Select options--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/sidebar-product.css">
    <link rel="stylesheet" href="/public/css/customlayout.css">
    <link rel="stylesheet" href="/public/css/product-site.css">
    <link rel="stylesheet" href="/public/css/owlCustom.css">-->
    {{--    Style all page--}}
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    {{--    Silder Slick--}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    {{--    Slider owl--}}
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    {{--    Bootstrap css--}}
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

    {{--    Fontawesome--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    {{--    toaster show success or error--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--    Show success or error--}}
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{session('toastr.type')}}";
            var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
</head>
<body>
<div class="wrapper">
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')
    {{--@yield('script')--}}
</div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v6.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="106165084401878"
     theme_color="#0084ff"
     logged_in_greeting="Chào bạn ! Chào mừng bạn đã đến với Meecosmetic. "
     logged_out_greeting="Chào bạn ! Chào mừng bạn đã đến với Meecosmetic. ">
</div>
</body>
<script type="text/javascript">
    /
    $(function () {

        $(".js-modal-register").click(function (event) {
            event.preventDefault();
            $("#myModalRegister").modal('show');
        });
        let URL = '{{ route('post.register') }}';
        $('.js-btn-login').click(function (e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('form');

            $.ajax({
                url: URL,
                data: $domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $("#myModalRegister").modal('hide');
                $("#form-register")[0].reset();
            }).fail(function (data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function (i, val) {
                    $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
                });
            });
        });
    });

    $(function () {
        $(".js-modal-login").click(function (event) {
            event.preventDefault();
            $("#myModalLogin").modal('show');
        });
        let URL = '{{ route('post.login') }}'
        $('.js-btn-logins').click(function (e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('form');

            $.ajax({
                url: URL,
                data: $domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $("#myModalLogin").modal('hide');
                $("#form-login")[0].reset();
            }).fail(function (data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function (i, val) {
                    $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
                });
            });
        });
    })


</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{--Google map api--}}

@yield('script')

<script src="{{asset('frontend/js/main.js')}}"></script>

<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen-sprite.png">

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
</html>
