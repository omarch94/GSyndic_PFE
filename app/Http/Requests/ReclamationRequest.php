<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReclamationRequest extends FormRequest
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
            'designation' => 'required|unique:reclamations,designation,'.$this->route('id'),
            'date_reclamation' => 'required|date',
            'type_reclamation_id' => 'required',
            'copropriete_id' => 'required',
            'canal_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'designation.required' => 'La désignation est obligatoire.',
            'designation.unique' => 'Cet désignation est déjà utilisé.',
            'date_reclamation.required' => 'La date de réclamation est obligatoire.',
            'date_reclamation.date' => 'La date de réclamation doit être une date valide.',
            'type_reclamation_id.required' => 'Le type de réclamation est obligatoire.',
            'copropriete_id.required' => 'La copropriété est obligatoire.',
            'canal_id.required' => 'Le canal de réclamation est obligatoire.',
        ];
    }
}
