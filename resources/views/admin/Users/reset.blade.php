@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="d-flex mb-3">
            <div class="col-md-5 d-flex align-items-center">
                <label for="">Mật khẩu mới</label>
                <div class="w-60">
                    @error('pass')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                    <input type="password" class="form-control m-2" style="width: 100%" name="pass" placeholder="Enter new password" value="{{old('pass')}}">
                </div>
            </div>
                <div class="col-md-5 d-flex align-items-center">
                    <label>Nhập lại mật khẩu</label>
                    <div class="w-60">
                        @error('repass')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                        <input type="password" class="form-control m-2" style="width: 100%" name="repass" placeholder="Retype password" value="{{old('repass')}}">
                    </div>
            </div>
            <div class="col-md-2 m-auto">
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-list-check"></i>
                    Cập nhật
                </button>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <tr>
                <th>
                    Mã nhân viên
                </th>
                <th>
                    Họ tên
                </th>
                <th>
                    Email
                </th>
                <th>
                    Năm sinh
                </th>
                <th>
                    Giới tính
                </th>
                <th>
                    Phòng ban
                </th>
                <th>
                    Chức vụ
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            @foreach ($users as $user )
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->birth_day}}
                    </td>
                    <td>
                        {{$user->sex}}
                    </td>
                    <td>
                        {{$user->department_name}}
                    </td>
                    <td>
                        @if($user->role == 0)
                        <p>Root account</p>
                        @elseif($user->role == 1)
                            <p>Giám đốc</p>
                        @elseif($user->role == 2) 
                            <p>Trưởng phòng</p>
                        @else
                            <p> Nhân viên</p>
                        @endif
                    </td>
                    <td>
                        <input type="checkbox" name="user_list[]" value="{{$user->id}}">
                    </td>
                </tr>
            @endforeach
        </table>
        @csrf
</form>
<div class="col-md-3">
    {{-- phan trang  --}}
    {{ $users->links('pagination::bootstrap-4') }}
</div>

@endsection
