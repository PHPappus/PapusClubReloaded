<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class MakeInscriptionFamiliarRequest extends Request
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
            'password'      => 'required',
            'persona_id'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'La contraseña es requerida',
            'persona_id.required' => 'Seleccionar al familiar es obligatorio',
        ];
    }
}
