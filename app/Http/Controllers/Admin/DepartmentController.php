<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\UpdateDepartment;
use App\Models\Department;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
class DepartmentController extends Controller
{
    //trang them moi phong ban
    public function create(){
        if (!Gate::allows('create-department')){
            return view('admin.departments.add',[
                'title' => 'Thêm phòng ban'
            ]);
        }else{
            return view('admin.error',[
                'title' => 'Từ chối truy cập'
            ]);
        }
    }
    //xu ly request them phong ban
    public function store(DepartmentRequest $request){
        // dd($request->all());
        try {
            $request->except('_token');
            Department::create($request->all());
            Session::flash('success', 'Thêm phòng ban thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
            return  false;
        }
        return redirect()->back();
    }
    //ham lay danh sach phong ban
    public function getDepartment(){
        return Department::orderby('id')->paginate(15);
    }
    public function index(){
        return view('admin.departments.index',[
            'title' => 'Danh sách phòng ban',
            'departments' => $this->getDepartment(),
        ]);
    }
    //hien thi thong tin phong ban
    public function show(Department $department){
        if (!Gate::allows('create-department')){
            return view('admin.departments.edit',[
                'title' => 'Cập nhật phòng ban',
                'department' =>$department
            ]);
        }else{
            return view('admin.error',[
                'title' => 'Từ chối truy cập'
            ]);
        }
    }
    //cap nhat phong ban
    public function update(Department $department,UpdateDepartment $request){
        try{
            $department->name = (string)$request->input('name');
            $department->email = (string)$request->input('email');
            $department->phone = (string)$request->input('phone');
            $department->active = (int)$request->input('active');
            $department->save();
            Session::flash('success', 'Cập nhật thông tin phòng ban thành công');
        }catch(\Exception $err){
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
        }
        return redirect()->back();  
    }
}
