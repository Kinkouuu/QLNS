<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Reset extends FormRequest
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
            'pass' => 'min:6',
            'repass' => 'same:pass'
        ];
    }
    public function messages()
    {
        return [
            'min' => ':attribute tối thiểu 6 kí tự',
            'same' => ':attribute không khớp'
        ];
    }
    public function attributes()
    {
        return[
            'pass' => 'Mật khẩu đăng nhập',
            'repass' => 'Mật khẩu đăng nhập',
        ];
    }
}
