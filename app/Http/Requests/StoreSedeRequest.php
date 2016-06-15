<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreSedeRequest extends Request
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
            'nombre'          =>  'required|max:100|string|unique:sede,nombre,NULL',
            'telefono'       =>  'required|max:12|string',
            'departamento'       =>  'max:100|string',
            'provincia'      =>  'max:100|string',
            'distrito'      =>  'max:100|string',
            'direccion'         =>  'required|max:100|string|unique:sede,direccion,NULL',
            'referencia'         =>  'max:100|string',
            'nombre_contacto'         =>  'required|max:100|string',
            'capacidad_maxima'      =>  'integer|min:1',
            'capacidad_socio'      =>  'integer|min:1|max:capacidad_maxima'
        ];
    }
}
