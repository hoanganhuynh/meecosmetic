@extends('layouts.masterFrontend')
@section('content')
    <div class="container py-3 main-register">
        <div class="row">
            <!-- <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="font-size: 15px">
                        <li class="breadcrumb-item"><a href="{{route('get.home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                    </ol>
                </nav>
            </div> -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card border-secondary">
                            <div class="card-header" style="background: #330080; text-align: center; color: #fff; font-size: 1.5rem;">
                                <h3 class="mb-0 my-2">Đăng ký</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputName" class="mb-2">Họ và tên </label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Họ và tên" name="name" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <div class="error-txt mt-2">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="mb-2">Email</label>
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="ex@gmail.com" name="email" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <div class="error-txt mt-2">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="mb-2">Password</label>
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="password" title="At least 6 characters with letters and numbers" name="password">
                                        @if($errors->has('password'))
                                            <div class="error-txt mt-2">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-dark" style="background: #330080">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->

            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
@endsection
