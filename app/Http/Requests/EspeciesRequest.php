<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EspeciesRequest extends FormRequest
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
            'Especie' => 'required|max:10|unique:especies,nom_especie',
            
        ];
    }

    public function messages(){
        return [
            'Especie.required' => 'indicar nombre de la especie',
            'Especie.max' => 'maximo 10 caracteres',
            'Especie.unique' => 'Esta especie ya existe'

            
        ];
    }
}
