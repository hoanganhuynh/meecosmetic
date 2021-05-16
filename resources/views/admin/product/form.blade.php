<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label for="inputName" class="col-form-label" >Tên sản phẩm</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nhập tên sản phẩm" value="{{old('pr_name',isset($product->pr_name) ? $product->pr_name : '')}}" name="pr_name">
                @if($errors->has('pr_name'))
                    <div class="error-txt">{{ $errors->first('pr_name') }}</div>
                @endif
        </div>
        
        <div class="form-group">
            <label for="inputName" class="col-form-label" >Giá sản phẩm</label>
            <input type="text" class="form-control" id="inputName" placeholder="VND" value="{{old('pr_price',isset($product->pr_price) ? $product->pr_price : '')}}" name="pr_price">
            @if($errors->has('pr_price'))
                <div class="error-txt">{{ $errors->first('pr_price') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="inputName" class="col-form-label" >Số lượng</label>
            <input type="text" class="form-control" id="inputName" placeholder="Số lượng sản phẩm..." value="{{old('pr_quality',isset($product->pr_quality) ? $product->pr_quality : '')}}" name="pr_quality">
            @if($errors->has('pr_quality'))
                <div class="error-txt">{{ $errors->first('pr_quality') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="inputName" class="col-form-label" >Khuyến mãi (%)</label>
            <input type="number" class="form-control" id="inputName"  value="0" name="pr_sale">
        </div>

        <div class="form-group">
            <label for="inputName" class="col-form-label" >Giới thiệu sản phẩm</label>
            <textarea class="form-control" id="inputName" rows="3" placeholder="Mô tả sản phẩm..." value="{{old('pr_desc',isset($product->pr_desc) ? $product->pr_desc : '')}}" name="pr_desc"></textarea>
        </div>

        <div class="form-group">
            <label for="inputName" class="col-form-label" >Thành phần</label>
            <textarea class="form-control" id="inputName" rows="3" placeholder="Thành phần..." value="{{old('pr_ingredent',isset($product->pr_ingredent) ? $product->pr_ingredent : '')}}" name="pr_ingredent"></textarea>
        </div>

        <div class="form-group">
            <label for="inputName" class="col-form-label" >Công dụng</label>
            <textarea class="form-control" id="inputName" rows="3" placeholder="Công dụng..." value="{{old('pr_uses',isset($product->pr_uses) ? $product->pr_uses : '')}}"name="pr_uses"></textarea>
        </div>

        <div class="form-group">
            <label for="inputName" class="col-form-label" >Hướng dẫn sử dụng</label>
            <textarea class="form-control" id="inputName" rows="3" placeholder="Hướng dẫn sử dụng..." value="{{old('pr_instruction_for_use',isset($product->pr_instruction_for_use) ? $product->pr_instruction_for_use : '')}}"name="pr_instruction_for_use"></textarea>
        </div>
        
        <div class="form-group">
            <label for="inputState" class="col-form-label">Thương hiệu của sản phẩm</label>
            <select  class="form-control select" name="br_id">
                <option value="">Chọn thương hiệu</option>
                @if(isset($brands))
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{old('br_id', isset($product->br_id) ? $product->br_id : '') == $brand->id ? 'selected' : ''}}>{{$brand->br_name}}</option>
                    @endforeach
                @endif
            </select>
            @if($errors->has('br_id'))
                <div class="error-txt">{{ $errors->first('br_id')}}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="inputState" class="col-form-label">Loại sản phẩm</label>
            <select  class="form-control select" name="tp_id">
                <option value="">Chọn loại sản phẩm</option>
                @if(isset($type_products))
                    @foreach($type_products as $type_product)
                        <option value="{{$type_product->id}}" {{old('tp_id', isset($product->tp_id) ? $product->tp_id : '') == $type_product->id ? 'selected' : ''}}>{{$type_product->tp_name}}</option>
                    @endforeach
                @endif
            </select>
            @if($errors->has('tp_id'))
                <div class="error-txt">{{ $errors->first('tp_id')}}</div>
            @endif
        </div>

        <div class="form-group ">
                <button type="submit" class="btn btn-success" name=submit"">Lưu thông tin</button>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <img id="out_img" src="{{asset('frontend/image/unnamed.jpg')}}" alt="" style="width: 100%; height: 250px">
        </div>
        <div class="form-group">
            <label for="inputName" class="col-form-label" >Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="input_img" name="pr_img">
            @if($errors->has('pr_img'))
                <div class="error-txt">{{ $errors->first('pr_img') }}</div>
            @endif
        </div>

        <div class="form-group">
            <img id="out_img" src="{{asset('frontend/image/unnamed.jpg')}}" alt="" style="width: 100%; height: 250px">
        </div>
        <div class="form-group">
            <label for="inputName" class="col-form-label" >Ảnh mô tả sản phẩm</label>
            <input type="file" class="form-control" id="input_img" name="pr_img1">

        </div>

        <div class="form-group">
            <img id="out_img" src="{{asset('frontend/image/unnamed.jpg')}}" alt="" style="width: 100%; height: 250px">
        </div>
        <div class="form-group">
            <label for="inputName" class="col-form-label" >Ảnh mô tả sản phẩm</label>
            <input type="file" class="form-control" id="input_img" name="pr_img2">

        </div>
        
    </div>

    </div>

</form>
