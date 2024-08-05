<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaiKhoanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required|max:255',
        'email' => 'required|unique:users,email,' .  $this->route('id'),
        'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
        'name.required' => 'Tên tài khoản không được để trống',
        'name.max' => 'Tên tài khoản không được quá 255 kí tự',
        'email.required' => 'Email không được để trống',
        'email.unique' => 'Email không được trùng',
        'password.required' => 'Mật khẩu không được để trống',
        'password.string' => 'Mật khẩu phải laf chuỗi',
        'password.min' => 'Mật khẩu phải lớn hơn hoặc bằng 8 ký tự',
        ];
    }
}
