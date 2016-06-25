<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditSocioViviendaRequest extends Request
{   


    protected $errorBag = 'vivienda';
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
            'departamento_vivienda'=>'required|not_in:-1',
            'provincia_vivienda'=>'required|not_in:-1',
            'distrito_vivienda'=>'required|not_in:-1',
            'domicilio'=>'required|string',
            'referencia_vivienda'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'departamento_vivienda.required' => 'El campo departamento de la vivienda es obligatorio ',
            'departamento_vivienda.not_in'=>'El campo departamento de la vivienda debe ser seleccionado',


            'provincia_vivienda.required' => 'El campo provincia de la vivienda es obligatorio ',
            'provincia_vivienda.not_in'=>'El campo provincia de la vivienda debe ser seleccionado',

            'distrito_vivienda.required' => 'El campo distrito de la vivienda es obligatorio',
            'distrito_vivienda.not_in'=>'El campo distrito de la vivienda debe ser seleccionado',                        

        ];
    }

}
