<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $idPermission = $this->route('id') ?? '';
        return [
            'name' => 'required|unique:permissions,name,' . $idPermission,
            'display_name' => 'required|unique:permissions,display_name,' .$idPermission
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
