<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReunionRequest extends FormRequest
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
            'sujet' => 'required',
            'date' => 'required|date',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'description' => 'nullable',
            'immeuble_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sujet.required' => 'Le champ sujet est obligatoire.',
            'date.required' => 'Le champ date est obligatoire.',
            'date.date' => 'Le champ date doit être une date valide.',
            'heure_debut.required' => 'Le champ heure de début est obligatoire.',
            'heure_debut.date_format' => 'Le champ heure de début doit être au format H:i.',
            'heure_fin.required' => 'Le champ heure de fin est obligatoire.',
            'heure_fin.date_format' => 'Le champ heure de fin doit être au format H:i.',
            'heure_fin.after' => 'Le champ heure de fin doit être postérieure à l\'heure de début.',
            'immeuble_id.required' => 'Le champ immeuble est obligatoire.',
        ];
    }

}
