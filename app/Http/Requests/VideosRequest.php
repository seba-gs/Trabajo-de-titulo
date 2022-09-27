<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideosRequest extends FormRequest
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'link' => 'required',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre es requerido',
            'descripcion.required' => 'La descripcion es requerido',
            'link.required' => 'El link es requerido',
        ];
    }
}
