<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditPostulanteViviendaRequest extends Request
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
            //Vivienda            'puestoSelect' => 'required|exists:configuracion,id'
            'departamento_vivienda' => 'required|exists:departamento,id',
            'provincia_vivienda' => 'required|exists:provincia,id',
            'distrito_vivienda' => 'required|exists:distrito,id',
            'domicilio'=>'required',
            'referencia_vivienda'=>'required',        ];
    }

}
