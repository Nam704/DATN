<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RomRequest extends FormRequest
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
        
        $idRom = $this->route('id')? $this->route('id'):"";

        return [
            'rom_size' =>
                'required|unique:roms,rom_size',
                'integer','max:2048','min:1'.$idRom,
                
        ];
    }
    public function messages(): array {
         return [ 
            'rom_size.required' => 'Trường ROM là bắt buộc.',
            'rom_size.integer' => 'ROM phải là một số nguyên.',
            'rom_size.min' => 'ROM phải có giá trị tối thiểu là 1.',
            'rom_size.max' => 'ROM không được vượt quá 2048MB.',
            'rom_size.unique' => 'Giá trị ROM này đã tồn tại.',
        ];
         }
}
