<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DossierStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'ref' => 'nullable|string',
            'encours' => 'nullable',
            'niveau' => 'nullable|string',
            'type' => 'nullable|string',
            'annee' => 'nullable|string|min:4|max:4',
            'tribunal_id' => 'nullable|integer',
            'observation' => 'nullable',
            'dossier_id' => 'nullable|integer'
             ];
    }
}
