<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:departments,name',
            'email' => 'required',
            'phone' => 'required|starts_with:0|min:100000000|max:999999999|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'unique'=> ':attribute đã tồn tại, vui lòng nhập :attribute khác',
            'min' => ':attribute tối thiểu 10 kí tự',
            'max' => ':attribute tối đa 10 kí tự',
            'starts_with'=> ':attribute phải bắt đầu bằng 0',
            'numeric' => ':attribute phải là số'
        ];
    }
    public function attributes(){
        return[
            'name' => 'Tên phòng ban',
            'email' => 'Email phòng ban',
            'phone' => 'Số điện thoại'
        ];
    }
}
