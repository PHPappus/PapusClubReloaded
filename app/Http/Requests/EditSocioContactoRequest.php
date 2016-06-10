<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditSocioContactoRequest extends Request
{
    protected $errorBag = 'contacto';    
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
            'telefono_domicilio'=>'required|string|max:12',
            'telefono_celular'=>'required|string|max:12',
            'correo'=>'required|email'
        ];
    }

    public function messages()
    {
        return [
            'telefono_domicilio.required' => 'El campo teléfono domicilio es obligatorio ',
            'telefono_domicilio.string'=>'El campo teléfono domicilio debe tener formato válido',
            'telefono_domicilio.max'=>'El campo teléfono domicilio no puede ser mayor a 12 dígitos',

            'telefono_celular.required' => 'El campo teléfono celular es obligatorio ',
            'telefono_celular.string'=>'El campo teléfono celular debe tener formato válido',
            'telefono_celular.max'=>'El campo teléfono celular no puede ser mayor a 12 dígitos',

            'correo.required' => 'El campo correo es obligatorio',
            'correo.email'=>'El campo correo debe tener formato válido',
        ];
    }
}
