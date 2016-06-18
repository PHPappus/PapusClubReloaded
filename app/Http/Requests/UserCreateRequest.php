<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'persona_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:16',
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'persona_id.required'   => 'Es necesario asignar a una persona',
            'email.required'                 => 'El correo es obligatorio',
            'password.required'     => 'La contraseña es obligatoria',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria',
            'password.min' => 'La contraseña debe contener como minimo 8 caracteres',
            'password.max' => 'La contraseña debe contener como máximo 16 caracteres',
            'password.confirmed' => 'La contraseña y la confirmación de la contraseña no coinciden',
        ];
    }
}
