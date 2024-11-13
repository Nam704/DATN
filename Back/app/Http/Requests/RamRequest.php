<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class RamRequest extends FormRequest
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



        $idRam = $this->route('id') ? $this->route('id') : "";
        return [
            'ram_size' =>
            'required|unique:rams,ram_size',
            'integer',
            'max:16',
            'min:1'
          . $idRam,


        ];
    }
    public function messages(): array
    {
        return [
            'ram_size.required' => 'Trường RAM là bắt buộc.',
            'ram_size.integer' => 'RAM phải là một số nguyên.',
            'ram_size.min' => 'RAM không được vượt quá 16GB.',
            'ram_size.max' => 'RAM không được vượt quá 16GB.',
            'ram_size.unique' => 'Giá trị RAM này đã tồn tại.',
        ];
    }
}
