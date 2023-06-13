<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactureRequest extends FormRequest
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
            'numero_facture' => 'required|unique:factures,numero_facture,'.$this->route('id'),
            'date_emission' => 'required|date',
            'date_echeance' => 'required|date',
            'montant_total' => 'required|numeric',
            'copropriete_id' => 'required',
            'charge_id' => 'required',
            'etat_facture_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'numero_facture.required' => 'Le numéro de facture est obligatoire.',
            'numero_facture.unique' => 'Ce numéro de facture est déjà utilisé.',
            'date_emission.required' => 'La date d\'émission est obligatoire.',
            'date_emission.date' => 'Veuillez entrer une date valide pour la date d\'émission.',
            'date_echeance.required' => 'La date d\'échéance est obligatoire.',
            'date_echeance.date' => 'Veuillez entrer une date valide pour la date d\'échéance.',
            'montant_total.required' => 'Le montant total est obligatoire.',
            'montant_total.numeric' => 'Veuillez entrer une valeur numérique pour le montant total.',
            'copropriete_id.required' => 'La copropriété est obligatoire.',
            'charge_id.required' => 'La charge est obligatoire.',
            'etat_facture_id.required' => 'L\'état de la facture est obligatoire.',
        ];
    }
}
