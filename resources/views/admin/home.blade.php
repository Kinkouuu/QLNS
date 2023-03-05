@extends('admin.main')
@section('content')

<div class="col-md-6 m-auto">
    <form action="" method="post">
        <div class="col-md-12">
            <input type="hidden" name="id" value="{{$user->id}}"> 
            <label for="">Tài khoản email</label>
            <input class="form-control" type="email" readonly name="email" value="{{$user->email}}">
        </div>
        <div class="col-md-12">
            <label for="">Họ Tên</label>
            @error('name')
            <span style="color:red">{{$message}}</span>
            @enderror
            <input class="form-control" type="text" name="name" value="{{$user->name}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Năm sinh</label>
            @error('birth_day')
            <span style="color:red">{{$message}}</span>
            @enderror
            <input type="date" class="form-control" name="birth_day" value="{{$user->birth_day}}">
        </div>
        <div class="col-md-12">
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
        <div class="col-md-12">
            <label for="">Đơn vị công tác</label>
            <input class="form-control" readonly  value="{{$user->department_name}}">
        </div>
        <div class="col-md-12">
            <label for="">Chức vụ</label>
                @if($user->role == 0)
                    <input class="form-control" readonly value="Admin">
                @elseif ($user->role == 1) 
                    <input class="form-control" readonly  value="Giám đốc">
                @elseif ($user->role == 2) 
                    <input class="form-control" readonly  value="Trưởng phòng">
                @else
                    <input class="form-control" readonly  value="Nhân viên">
            @endif
        </div>
        <div class="col-md-12 text-center">
            <button class="btn btn-outline-success mt-3">
                <i class="fas fa-user-pen"></i>
                Cập nhật
            </button>
        </div>
        @csrf
    </form>
</div>

@endsection