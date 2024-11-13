<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
        $idColor=$this->route('id')? $this->route('id'):"";
        return [
            'name' => 'required|unique:colors,name,' .$idColor,

                
               
        ];
    }
    public function messages(): array {
        return [ 
           'name.required' => 'Trường COLOR là bắt buộc.',
           'name.unique' => 'Giá trị COLOR này đã tồn tại.',
       ];
        }
}
