<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'ten_nguoi_nhan' => 'required|string|max:255',
            'so_dien_thoai_nguoi_nhan' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email_nguoi_nhan' => 'required|string|email|max:255',
            'dia_chi_nguoi_nhan' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_nguoi_nhan.required' => 'Tên là bắt buộc.',
            'ten_nguoi_nhan.string' => 'Tên phải là chuỗi kí tự.',
            'ten_nguoi_nhan.max' => 'Tên không vượt quá 255 kí tự.',
            'so_dien_thoai_nguoi_nhan.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai_nguoi_nhan.string' => 'Số điện thoại phải là chuỗi kí tự.',
            'so_dien_thoai_nguoi_nhan.regex' => 'Số điện thoại Không hợp lệ.',
            'so_dien_thoai_nguoi_nhan.min' => 'Số điện thoại phải có ít nhất 10 kí tự.',
            'email_nguoi_nhan.required' => 'email là bắt buộc',
            'email_nguoi_nhan.string' => 'Email phải là 1 chuỗi kí tự',
            'email_nguoi_nhan.email' => 'Email phải là một địa chỉ email hợp lệ',
            'email_nguoi_nhan.max' => 'Email không được vượt quá 255 kí tự',
            'dia_chi_nguoi_nhan.required' => 'Địa chỉ là bắt buộc.',
            'dia_chi_nguoi_nhan.string' => 'Địa chỉ  phải là chuỗi kí tự.',
            'dia_chi_nguoi_nhan.max' => 'Địa chỉ không được vượt quá 255 kí tự.',
        ];
    }
}
