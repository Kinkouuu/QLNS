<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
session_start();

class LoginController extends Controller
{
    public function index(){
        return view('admin.index',[
            'title' => 'ADMIN|LOGIN',
        ]);
    }
    public function store(LoginRequest $request){
            //kiem tra thong tin truyen vao
            if(Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]
            )){
                //lay thong tin nguoi login
                $user_name =Auth::user()->name;
                Session::put('user_name', $user_name);
                $user_id = Auth::id();
                Session::put('user_id', $user_id);
                if(Auth::user()->email_verified_at === null){
                    return redirect()->route('verification',[$user_id]);
                }else{
                    return redirect()->route('admin');
                }

            }
            Session::flash('error', 'Tài khoản đăng nhập hoặc mật khẩu sai');
            return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
