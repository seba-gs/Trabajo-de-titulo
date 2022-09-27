<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatrocinadoresRequest extends FormRequest
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
            'Nombre' => 'required|unique:patrocinador,nombre',
            'Descripcion' => 'required',
            'Email' => 'required'
        ];
    }

    public function messages(){
        return [
            'Nombre.required' => 'Campo nombre no puede estar vacio',
            'Nombre.unique' => 'Patrocinador ya existe',
            'Descripcion.required' => 'Campo Descripcion no puede estar vacio',
            'Email.required' => 'Campo email no puede estar vacio'
        ];
    }
}
