<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="author" content="">
    <title>Admin System</title>
    <!-- Custom fonts for this template-->

    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{session('toastr.type')}}";
            var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #330080">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('api-admin.index')}}">
            <!-- <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div> -->
            <div class="sidebar-brand-text mx-3">MeeCosmetic</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('api-admin.index')}}"><span>Trang chủ</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index.brand' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index.brand')}}"><span>Thương hiệu</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index.typeProduct' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index.typeProduct')}}"><span>Loại sản Phẩm</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index.product' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index.product')}}"><span>Sản Phẩm</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index.transaction' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index.transaction')}}"><span>Đơn hàng</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index.user' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index.user')}}"><span>Quản lý user</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item {{\Request::route()->getName() == 'admin.index.comment' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index.comment')}}"><span>Đánh giá</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" style="background-color: #f9f5ff;">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-purple topbar mb-4 static-top shadow ">



                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    @if(Auth::guard('admins')->check())
                    <li class="nav-item dropdown no-arrow">

                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{\Auth::guard('admins')->user()->name}}</span>
                            
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('post.logout.admin')}}" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </li>
                    @endif

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">


                @yield('content')
            </div>
        </div>


    </div>

</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>

<!-- Bootstrap core JavaScript-->

{{--<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>--}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{--Toastr js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{--Toastr show case--}}
<script type="text/javascript">
    if (typeof TYPE_MESSAGE != 'undefined') {
        switch (TYPE_MESSAGE) {
            case 'success':
                toastr.success(MESSAGE);
                break;
            case 'error':
                toastr.error(MESSAGE);
                break;
        }
    }
</script>
@yield('script')


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#out_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#input_img").change(function() {
        readURL(this);
    });

    $(document).ready(function() {
        $('#loginModal').modal('show');
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>

<script>
    $(document).ready(function () {
        $(".js-modal-register").click(function (event) {
            event.preventDefault();
            $("#myModal").modal('show');
        });
        
    });

</script>


</html>
