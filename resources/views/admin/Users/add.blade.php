@extends('admin.main')
@section('content')
    <form action="" method="post">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Họ tên</label>
                    @error('name')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Tài khoản email</label>
                            @error('email')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Mật khẩu</label>
                            @error('pass')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                            <input type="password" class="form-control" name="pass" value="{{old('pass')}}">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Năm sinh</label>
                            @error('birth_day')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                            <input type="date" class="form-control" name="birth_day" value="{{old('birth_day')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Giới tính</label>
                            <div class="d-flex">
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault2" value="Nam" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault1" value="Nữ">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Phòng ban</label>
                            <select class="form-control" aria-label="Default select example" name="department_id">
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Chức vụ</label>
                            <select class="form-control" aria-label="Default select example" name="role">
                                <option value="1">Giám đốc</option>
                                <option value="2">Trưởng phòng</option>
                                <option value="3">Nhân viên</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i>
                Thêm
            </button>
        </div>
        @csrf
    </form>
@endsection
