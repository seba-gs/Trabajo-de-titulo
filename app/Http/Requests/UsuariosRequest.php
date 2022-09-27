<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'email' => 'required|unique:usuarios,Email|email',
            'nomUsuario' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'El campo email no puede estar vacio',
            'email.unique' => 'Ya existe una cunta con ese email',
            'email.email' => 'Ingresar email valido',
            'nomUsuario.required' => 'El campo nombre de usuario no puede estar vacio',
            'nombre.required' => 'El campo nombre no puede estar vacio',
            'apellido.required' => 'El campo apellido no puede estar vacio',
            'password.required' => 'El campo contraseña no puede estar vacio',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres',
            'cpassword.required' => 'El campo confirme contraseña no puede estar vacio',
        ];
    }
}
