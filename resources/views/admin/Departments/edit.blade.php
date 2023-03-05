@extends('admin.main')
@section('content')
    <form action="" method="post">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Mã phòng ban</label>
                    <input type="text" readonly class="form-control" name="id" value="{{$department->id}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Tên phòng ban</label>
                    @error('name')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="text" class="form-control" name="name" value="{{$department->name}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Email</label>
                    @error('email')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="email" class="form-control" name="email"  value="{{$department->email}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Số điện thoại</label>
                    @error('phone')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="text" class="form-control" name="phone"  value="{{$department->phone}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="flexRadioDefault2" value="1"  {{ $department->active == 1? 'checked=""' : ''}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Kích hoạt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="flexRadioDefault1"  {{ $department->active == 0? 'checked=""' : ''}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Vô hiệu hóa
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-file-pen"></i>
                Cập nhật
            </button>
        </div>
        @csrf
    </form>
@endsection
