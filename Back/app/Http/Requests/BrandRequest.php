<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $idBrand = $this->route('id') ? $this->route('id') : "";
        return [
            'name' => 'required|unique:brands,name,' . $idBrand,



        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường Brand là bắt buộc.',
            'name.unique' => 'Giá trị Brand này đã tồn tại.',
        ];
    }
}
