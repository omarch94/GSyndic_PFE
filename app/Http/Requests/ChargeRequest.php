<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChargeRequest extends FormRequest
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
            'designation' => 'required|unique:charges,designation,'.$this->route('id'),
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'type_charge_id' => 'required',
            'copropriete_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'designation.required' => 'Le champ designation est obligatoire.',
            'designation.unique' => 'Désignation spécifiée existe déjà.',
            'date.required' => 'Le champ date est obligatoire.',
            'date.date' => 'Le champ date doit être une date valide.',
            'montant.required' => 'Le champ montant est obligatoire.',
            'montant.numeric' => 'Le champ montant doit être un nombre.',
            'type_charge_id.required' => 'Le champ type de charge est obligatoire.',
            'copropriete_id.required' => 'Le champ copropriété est obligatoire.',
        ];
    }

}
