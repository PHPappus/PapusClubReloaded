<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class ChangePasswordRequest extends Request
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
            'password_current' => 'required',
            'password' => 'required|confirmed|min:8|max:16',
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'password_current.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password_confirmation.required' => 'El campo es requerido',
            'password.min' => 'La contraseña nueva debe contener como minimo 8 caracteres',
            'password.max' => 'La contraseña nueva debe contener como máximo 16 caracteres',
            'password.confirmed' => 'La contraseña nueva y la confirmación de la contraseña nueva no coinciden',
        ];
    }
}
