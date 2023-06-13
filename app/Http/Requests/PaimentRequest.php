<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaimentRequest extends FormRequest
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
            'montant' => 'required|numeric',
            'date_paiment' => 'required|date',
            'mode_paiment_id' => 'required',
            'facture_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'montant.required' => 'Le montant est obligatoire.',
            'montant.numeric' => 'Le montant doit être un nombre.',
            'date_paiment.required' => 'La date de paiment est obligatoire.',
            'date_paiment.date' => 'Veuillez entrer une date valide pour la date de paiment.',
            'mode_paiment_id.required' => 'Le mode de paiment est obligatoire.',
            'facture_id.required' => 'La facture est obligatoire.',
        ];
    }

}
