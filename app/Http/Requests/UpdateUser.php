<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
        /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $id = $this->id;
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' .$id,
            'pass' => 'required|min:6',
            'birth_day' => 'required|before:tomorrow',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'email' => 'Định dạng :attribute không chính xác',
            'unique' => ':attribute đã tồn tại, vui lòng nhập :attribute khác',
            'min' => ':attribute tối thiểu 6 kí tự',
            'before' => ':attribute phải từ nay trở về trước'
        ];
    }
    public function attributes()
    {
        return[
            'name' => 'Họ tên nhân viên',
            'email' => 'Tài khoản email',
            'pass' => 'Mật khẩu đăng nhập',
            'birth_day' => 'Ngày tháng năm sinh'
        ];
    }
}
