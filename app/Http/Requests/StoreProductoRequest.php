<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreProductoRequest extends Request
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
            'nombre'   =>  array('required','Regex:/[A-Za-z .]/'),
            'descripcion'   =>  'required|string|max:255',            
            'estado'        =>  'required|integer',
            'id_tipo_producto'    =>  'required|integer'           
        ];
    }
}
