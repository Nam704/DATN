<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $idCategory = $this->route('id') ? $this->route('id') : "";
        return [
            'name' => 'required|unique:categories,name,' . $idCategory,



        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường Category là bắt buộc.',
            'name.unique' => 'Giá trị Category này đã tồn tại.',
        ];
    }
}
