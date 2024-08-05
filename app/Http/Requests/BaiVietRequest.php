<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaiVietRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'message' => 'lỗi thêm bài viết',
            'status' => false,
            'errors'=> $validator->errors()

        ], 400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hinh_anh' => 'nullable|image|mimes:png,jpg,jpeg',
            'tieu_de' => 'required|string|max:255',
            'noi_dung' =>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'hinh_anh.image' => 'Phải là ảnh',
            'hinh_anh.mimes' => 'Hình ảnh phải có đuôi png jpg jpeg',
            'tieu_de.required' => 'Tiêu đề không được để trống',
            'tieu_de.string' => 'Tiêu đề phải là chuổi lí tự',
            'tieu_de.max' => 'Tiêu đề không vượt quá 255 kí tự',
            'noi_dung.required' =>'Mội dung không được để trống',
        ];
    }
}
