@extends('admin.main')

@section('content')
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
                <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="" class="btn btn-outline-danger" onclick="removeRow({{$user->id}},'/admin/users/destroy')">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>
<div class="col-md-3">
    {{-- phan trang  --}}
    {{ $users->links('pagination::bootstrap-4') }}
</div>

@endsection
