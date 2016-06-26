<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreIngresoProductoRequest extends Request
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
            'proveedor_id'   =>  'required|integer|exists:proveedor,id',
            'tipo_solicitud'   =>  'required|string|max:255',
            'descripcion'   =>  'required|string|max:255',
            'estado'        =>  'required|string|max:255'            
        ];
    }
}
