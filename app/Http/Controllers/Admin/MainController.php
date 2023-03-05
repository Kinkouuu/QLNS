<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
    public function getUser(){
        if (session()->has('user_id')) {
            $id = session()->get('user_id');      
            // dd($id);
            return DB::table('users')
            ->leftjoin('departments','users.department_id','=','departments.id')
            ->select('users.*','departments.name as department_name')
            ->where('users.id',$id)->first();
        ;
        }
    
    }
    public function index(){
        return view('admin.home',[
            'title' => 'Trang chủ',
            'user' => $this->getUser(),
        ]);
    }
    public function save(UpdateUser $request){
        // dd($request->all());
        try{
            DB::table('users')
            ->where('id',$request->input('id'))
            ->update(array(
                'name'=> $request->input('name'),
                'birth_day' => $request->input('birth_day'),
                'sex' => $request->input('sex')
                )); 
            Session::flash('success', 'Cập nhật thông tin nhân viên thành công');
            }catch(\Exception $err){
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
        }
        return redirect()->back();  
    }
}
