<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterProcesVerbalRequest extends FormRequest
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
            'proces_verbal' => 'required|mimes:pdf|max:2048,unique:reunions,proces_verbal,'.$this->route('id'),
        ];
    }

    public function messages()
    {
        return [
            'proces_verbal.required' => 'Le champs \'Procés verbal\' est obligatoire.',
            'proces_verbal.mimes' => 'Le fichier doit être de type PDF.',
            'proces_verbal.max' => 'La taille maximale du fichier est de 2048 kilo-octets.',
            'proces_verbal.unique' => 'cet fichier est déja existe sur le système.',
        ];
    }
}
