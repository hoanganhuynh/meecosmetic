<form action="" method="POST">
    @csrf
    <div class="form-group row">
        <label for="inputName" class="col-md-2 col-form-label" >Tên thương hiệu</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="inputName" placeholder="Tên thương hiệu..." value="{{old('br_name',isset($brand->br_name) ? $brand->br_name : '')}}" name="name">
            @if($errors->has('name'))
                <div class="error-txt">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="inputName" class="col-md-2 col-form-label" >Xuất xứ thương hiệu</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="inputName" placeholder="Xuất xứ..." value="{{old('br_origin',isset($brand->br_origin) ? $brand->br_origin : '')}}" name="origin">
            @if($errors->has('origin'))
                <div class="error-txt">{{ $errors->first('origin') }}</div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-md-2 col-form-label">Mô tả thương hiệu</label>
        <div class="col-md-8">
            <textarea class="form-control" id="inputName" rows="3" placeholder="Mô tả thương hiệu..." value="{{old('br_desc',isset($brand->br_desc) ? $brand->br_desc : '')}}"name="br_desc"></textarea>
        </div>
        
        
    </div>
    <div class="form-group row">
        <div class="col-md-8 d-flex justify-content-center">
            <button type="submit" class="btn btn-success" name=submit"">Lưu thương hiệu</button>
        </div>
    </div>

</form>
