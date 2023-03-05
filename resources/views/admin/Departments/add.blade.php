@extends('admin.main')
@section('content')
    <form action="" method="post">
        <div class="col-md-8 m-auto">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Tên phòng ban</label>
                    @error('name')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Email</label>
                    @error('email')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Số điện thoại</label>
                    @error('phone')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="flexRadioDefault2" value="1" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Kích hoạt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="flexRadioDefault1" value="0">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Vô hiệu hóa
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-briefcase"></i>
                Thêm
            </button>
        </div>
        @csrf
    </form>
@endsection
