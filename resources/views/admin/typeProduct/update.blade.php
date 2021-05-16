@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('admin.typeProduct.form')
            <div class="form-group row">
                <div class="col-md-8 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" name=submit"">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>

@endsection
