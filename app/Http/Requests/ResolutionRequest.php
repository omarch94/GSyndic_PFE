<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResolutionRequest extends FormRequest
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
            'date_resolution' => 'required|date',
            'reclamation_id' => 'required',
            'utilisateur_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date_resolution.required' => 'La date de résolution est obligatoire.',
            'date_resolution.date' => 'Veuillez entrer une date valide pour la date de résolution.',
            'reclamation_id.required' => 'La réclamation est obligatoire.',
            'utilisateur_id.required' => 'L\'utilisateur est obligatoire.',
        ];
    }

}
