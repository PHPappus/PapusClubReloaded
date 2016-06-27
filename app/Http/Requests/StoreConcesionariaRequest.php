<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreConcesionariaRequest extends Request
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
            'sede_id'  =>       'required|integer|exists:sede,id',
            'nombre'   =>  array('required','Regex:/[A-Za-z .-]/'),
            'ruc'               =>  'required|numeric',            
            'descripcion'         =>  'required|string|max:255',
            'telefono'          =>  'required|numeric|digits_between:7,9',
            'correo'            =>  'required|email|max:255',            
            'nombre_responsable' =>  array('required','Regex:/[A-Za-z .-]/'),            
            'tipo_concesionaria' => 'required|string|max:255',
            'fecha_inicio_concesion' => 'required|date_format:d/m/Y|after:today',
            'fecha_fin_concesion' => 'required|date_format:d/m/Y|after:fecha_inicio_concesion'
        ];
    }
}
