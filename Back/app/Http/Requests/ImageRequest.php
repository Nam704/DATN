<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048', // Xác thực ảnh
            'product_id' => 'required|exists:products,id', // Kiểm tra product_id có tồn tại trong bảng products
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Ảnh sản phẩm là bắt buộc.',
            'name.image' => 'Tệp tải lên phải là một ảnh.',
            'name.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'name.max' => 'Ảnh không được vượt quá 2MB.',
            'product_id.required' => 'Mã sản phẩm là bắt buộc.',
            'product_id.exists' => 'Sản phẩm không tồn tại.',
        ];
    }
}
