<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditSocioBasicoRequest extends Request
{


    protected $errorBag = 'basico';

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
            'estado_civil' =>'required|not_in:-1',
        ];
    }

    public function messages()
    {
        return [
            'estado_civil.required' => 'El campo Estado civil es obligatorio.',
            'estado_civil.not_in' => 'Debe seleccionar un estado civil válido en el rango.',
        ];
    }
}
