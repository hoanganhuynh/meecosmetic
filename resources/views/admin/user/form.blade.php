<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="form-group">
                <label for="inputName" class="col-form-label" >Tên thành viên</label>
                <input type="text" class="form-control" id="inputName" placeholder="Tên thành viên..." value="{{old('name',isset($user->name) ? $user->name : '')}}" name="name">
                @if($errors->has('name'))
                    <div class="error-txt">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="inputName" class="col-form-label" >Email thành viên</label>
                <input type="text" class="form-control" id="inputName" placeholder="Email thành viên..." value="{{old('email',isset($user->email) ? $user->email : '')}}" name="email">
                @if($errors->has('email'))
                    <div class="error-txt">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-success" name=submit"">Lưu thông tin</button>
            </div>
        </div>
    </div>
</form>
