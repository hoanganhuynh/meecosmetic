<form action="" method="POST">
    @csrf
    <div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label for="inputName" class="col-form-label" >Tên loại sản phẩm</label>
                <input type="text" class="form-control" id="inputName" placeholder="Tên loại sản phẩm..." value="{{old('tp_name',isset($typeProduct->tp_name) ? $typeProduct->tp_name : '')}}" name="tp_name">
                @if($errors->has('tp_name'))
                    <div class="error-txt">{{ $errors->first('tp_name') }}</div>
                @endif
        </div>
    <div class="form-group">
        <label for="inputName" class="col-form-label" >Mô tả loại sản phẩm</label>
        <input type="text" class="form-control" id="inputName" placeholder="Mô tả..." value="{{old('tp_desc',isset($typeProduct->tp_desc) ? $typeProduct->tp_desc : '')}}" name="tp_desc">
    </div>
</form>
