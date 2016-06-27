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
            'nombre_proveedor'   =>  array('required','Regex:/[A-Za-z .-]/'),
            'ruc'               =>  'required|numeric',            
            'direccion'         =>  'required|string|max:255',
            'telefono'          =>  'required|numeric|digits_between:7,9',
            'correo'            =>  'required|email|max:255',            
            'nombre_responsable' =>  array('required','Regex:/[A-Za-z .-]/'),
            'estado'            =>  'required|integer',
            'proveedor'            =>  'required|string|max:255'
        ];
    }
}
