<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprasRequest extends FormRequest
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
            'transaccion' => 'required|min:8|max:10|unique:compras,transaccion'
        ];
    }

    public function messages(){
        return [
            'transaccion.required' => 'El campo transaccion no puede estar vacio',
            'transaccion.min' => 'El minimo son 8 digitos',
            'transaccion.max' => 'El maximo son 10 digitos',
            'transaccion.unique' => 'El numero de transaccion ya existe',
        ];
    }
}
