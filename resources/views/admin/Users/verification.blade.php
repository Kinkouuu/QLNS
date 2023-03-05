@include('admin.head')

<div class="col-md-12 m-5 text-center">
    <h1>Tạo mật khẩu mới cho lần đầu đăng nhập</h1>
    <form action="" method="post">

        <input type="hidden" name="id" value="{{$id->id}}">
        <div class="col-md-6 m-auto">
            <label for="">Mật khẩu mới</label>
            <input type="password" class="form-control" name ="pass" placeholder="Enter your new password" >
            @error('pass')
            <p style="color:red">{{$message}}</p>
            @enderror
        </div>
        <div class="col-md-6 m-auto">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" name ="repass" placeholder="Retype your new password" >
            @error('repass')
            <p style="color:red">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-success mt-3">
            Cập nhật
        </button>
        @csrf
    </form>
</div>

@include('admin.end')