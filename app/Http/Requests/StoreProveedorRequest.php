<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreProveedorRequest extends Request
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
            'nombre_proveedor'   =>  array('required','Regex:/[A-Za-z .]/'),
            'ruc'               =>  'required|numeric',            
            'direccion'         =>  'required|string|max:255',
            'telefono'          =>  'required|numeric',
            'correo'            =>  'required|string|max:255',            
            'nombre_responsable' =>  'required|string|max:255',
            'estado'            =>  'required|integer'
        ];
    }
}
