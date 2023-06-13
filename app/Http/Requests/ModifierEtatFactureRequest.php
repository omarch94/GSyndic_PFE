<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierEtatFactureRequest extends FormRequest
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
            'etat_facture_id' => "required",
        ];
    }

    public function messages(){
        return [
            'etat_facture_id.required' => "Le champ 'etat du facture' est obligatoire.",
        ];
    }
}
