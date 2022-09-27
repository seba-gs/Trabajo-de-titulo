<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FotografiasRequest extends FormRequest
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
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Valor' => 'required',
            'Fotografia' => 'required',
        ];
    }

    public function messages(){
        return [
            'Nombre.required' => 'El campo nombre no puede estar vacio',
            'Fotografia.required' => 'El campo imagen no puede estar vacio',
            'Descripcion.required' => 'El campo descripcion no puede estar vacio',
            'Valor.required' => 'El campo valor no puede estar vacio',
        ];
    }
}
