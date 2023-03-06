@extends('admin.main')

@section('content')
<table class="table table-striped table-hover">
    <tr>
        <th>
            Mã phòng ban
        </th>
        <th>
            Tên phòng ban
        </th>
        <th>
            Email
        </th>
        <th>
            Số điện thoại
        </th>
        <th>
            Trạng thái
        </th>
        <th>
            &nbsp;
        </th>
    </tr>
    @foreach ($departments as $department )
        <tr>
            <td>
                {{$department->id}}
            </td>
            <td>
                {{$department->name}}
            </td>
            <td>
                {{$department->email}}
            </td>
            <td>
                {{$department->phone}}
            </td>
            <td>
                @if($department->active == 1)
                    <p style ="color:blue"> Kích hoạt</p>
                @else
                    <p style ="color:red"> Vô hiệu hóa</p>
                @endif
            </td>
            <td>
                <a href="{{route('departments.edit',['department'=>$department->id])}}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>
<div class="col-md-3">
    {{-- phan trang  --}}
    {{ $departments->links('pagination::bootstrap-4') }}
</div>

@endsection
