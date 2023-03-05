@extends('admin.main')
@section('content')
    <form action="" method="post">
                <div class="col-md-8 m-auto">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Mã nhân viên</label>
                            <input type="text" readonly class="form-control" name="id" value="{{$user->id}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Họ tên</label>
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Tài khoản email</label>
                            @error('email')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Năm sinh</label>
                            @error('birth_day')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                            <input type="date" class="form-control" name="birth_day" value="{{$user->birth_day}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Giới tính</label>
                            <div class="d-flex">
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault2" value="Nam" {{ $user->sex == 'Nam'? 'checked=""' : ''}}>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check m-2">
                                    <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault1" value="Nữ" {{ $user->sex == 'Nữ'? 'checked=""' : ''}}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Phòng ban</label>
                            <select class="form-control" aria-label="Default select example" name="department_id">
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}" {{$user->department_id == $department->id ? 'selected' : ''}}>
                                    {{$department->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Chức vụ</label>
                            <select class="form-control" aria-label="Default select example" name="role">
                                <option value="1" {{ $user->role == 1? 'selected=""' : ''}}>Giám đốc</option>
                                <option value="2" {{ $user->role == 2? 'selected=""' : ''}}>Trưởng phòng</option>
                                <option value="3" {{ $user->role == 3? 'selected=""' : ''}}>Nhân viên</option>
                            </select>
                        </div>
                        <button class="btn btn-outline-success">
                            <i class="fas fa-user-pen"></i>
                            Cập nhật
                        </button>
                    </div>
        @csrf
    </form>
@endsection
