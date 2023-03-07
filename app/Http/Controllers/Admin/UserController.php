<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\Reset;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\ResetMail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{      // lay thong tin nguoi truy cap
    public function author(){

    }
        // Lay danh sach phong ban
    public function getDepartment(){
        return Department::Where('active',1)->get();
    }
        // lay danh sach nhan vien
    public function getUser(){
        if(Auth::user()->role != 0) //  neu la nhan vien thi lay ds nhan vien cung cap tro xuong
        {
            $role = Auth::user()->role;
            $department_id = Auth::user()->department_id;
            return DB::table('users')
            ->leftjoin('departments','users.department_id','=','departments.id')
            ->select('users.*','departments.name as department_name')
            ->where('users.role','>=',$role)
            ->where('users.department_id','=',$department_id)
            ->paginate(15);
        }else{ //neu la admin thi lay het danh sach
            return DB::table('users')
            ->leftjoin('departments','users.department_id','=','departments.id')
            ->select('users.*','departments.name as department_name')
            ->where('users.role','>',0)
            ->paginate(15);
        }


    }
    // view form them tai khoan
    public function create(){
        if (!Gate::allows('create-user')){
            return view('admin.users.add',[
                'title' => 'Thêm danh nhân viên',
                'departments' => $this->getDepartment()
            ]);
        }else{
            return view('admin.error',[
                'title' => 'Từ chối truy cập'
            ]);
        }
    }
    //xu ly request them thong tin nhan vien
    public function store(UserRequest $request ){
        // $password = bcrypt($request->password);
        $password = Hash::make($request->pass);
        // dd($request->all());
        $request->merge(['password' => $password]);
        // dd($request->input());
        try {
            $request->except('_token');
            User::create($request->all());
            Session::flash('success', 'Thêm thông tin nhân viên thành công');

            #Hang doi Queue sendmail
            SendMail::dispatch($request->email,$request->pass)->delay(now()->addSeconds(2));
        } catch (\Exception $err) {
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');

            return  false;
        }
        return redirect()->back();
    }
     // trang danh sach nhan vien
    public function index(){
        return view('admin.users.index',[
            'title' => 'Danh sách nhân viên',
            'users' => $this->getUser(),
        ]);
    }
    // trang cap nhat thong tin nhan vien
    public function show(User $user){
        
        return view('admin.users.edit',[
            'title' => 'Cập nhật thông tin nhân viên',
            'user' => $user,
            'departments' => $this->getDepartment()
        ]);
    }
    //cap nhat thong tin nhan vien
    public function update(User $user,UpdateUser $request){
        // dd($request->all());
        try{
            DB::table('users')
            ->where('id',$request->input('id'))
            ->update(array(
                'email'=> $request->input('email'),
                'name'=> $request->input('name'),
                'birth_day' => $request->input('birth_day'),
                'sex' => $request->input('sex'),
                'department_id' => $request->input('department_id'),
                'role' => $request->input('role')
                ));
            Session::flash('success', 'Cập nhật thông tin nhân viên thành công');
        }catch(\Exception $err){
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
        }
        return redirect()->back();  
    }
    // xoa thong tin nguoi dung
    public function destroy(Request $request){

        if (!Gate::allows('delete-user')){
            $result = User::where('id', $request->input('id'))
            ->where('role','!=' ,'0')
            ->first();
            if ($result) {
                $result->delete();
                return response()->json([
                    'error' => false,
                    'message' => 'Xóa nhân viên thành công'
                ]);
            }
            else{
                return response()->json([
                    'error' => false,
                    'message' => 'Không thể xóa tài khoản admin'
                ]);
            }
        }else{
            return response()->json([
                'error' => false,
                'message' => 'Bạn không có quyền xóa tài khoản'
            ]);
        }
    }


    //trang cap nhat mat khau
    public function reset(){
        if (!Gate::allows('reset-user')){
            return view('admin.users.reset',[
                'title' => 'Cấp lại mật khẩu',
                'users' => $this->getUser(),
            ]);
        }else{
            return view('admin.error',[
                'title' => 'Từ chối truy cập'
            ]);
        }
    }
    //xu ly cap nhat mat khau
    public function change(Reset $request){
        $users = $request->user_list;
        if($users!== null){
            // dd($users);
        foreach($users as $user ){
            DB::table('users')
                ->where('id', $user)
                ->update(['password' => Hash::make($request->pass)]);
            $result = DB::table('users')
                    ->where('id', $user)->first();
        //    echo($result->email .' - ');
        // dd($request->input('pass'));
            #Hang doi Queue sendmail
            ResetMail::dispatch($result->email,$request->pass)->delay(now()->addSeconds(2));
        }
            Session::flash('success', 'Cập nhật thành công');
        }else{
            Session::flash('error', 'Vui lòng chọn danh sách tài khoản');
        }
        return redirect()->back();
    }

    //lan dau dang nhap
    public function verification(User $id){
        return view('admin.users.verification',[
            'title' => 'Lần đầu đăng nhập',
            'id' => $id
        ]);
    }
    
    public function firstLogin(Reset $request){
        // dd($request-> all());
        $password = Hash::make($request->pass);
        $request->merge(['password' => $password]);
        // dd($request->id);
        try {
            $request->except('_token');
            DB::table('users')
            ->where('id', $request->id)
            ->update(['password' => Hash::make($request->pass),
                    'email_verified_at' => now()]);
            Session::flash('success', 'Cập nhật mật khẩu thành công');
            $result = DB::table('users')
            ->where('id', $request->id)->first();
        //Gui mail
            // Mail::to($result->email)->send(new resetPass($request->input('pass')));
        #Hang doi Queue sendmail
        ResetMail::dispatch($result->email,$request->pass)->delay(now()->addSeconds(2));
        } catch (\Exception $err) {
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');

            return  false;
        }
        return redirect()->route('login');
    }
}

