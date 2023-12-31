<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:permissions,name,'.$this->route('id')
        ];
    }

    public function messages(){
        return [
            'name.required' => "Le champ permission est obligatoire.",
            'name.min' => "Le champ permission doit avoir au moins 3 caractères.",
            'name.unique' => "Cet permission est déjà utilisé.",
        ];
    }
}
