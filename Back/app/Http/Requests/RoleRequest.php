<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $idRole = $this->route('id') ?? ''; // Lấy ID từ route hoặc rỗng nếu không có
    
        return [
            'name' => 'required|unique:roles,name,' . $idRole,
            'display_name' => 'required|unique:roles,display_name,' . $idRole,
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Trường Name là bắt buộc.',
            'name.unique' => 'Giá trị Name này đã tồn tại.',
            'display_name.required' => 'Trường Display Name là bắt buộc.',
            'display_name.unique' => 'Giá trị Display Name này đã tồn tại.',
        ];
    }
    
}
