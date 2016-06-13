<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreProductoxFacturacionRequest extends Request
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
            'producto_id'   =>  'required|integer',
            'facturacion_id'   =>  'required|integer',            
            'cantidad'   =>  'required|integer|min:1|max:2147483647'
        ];
    }
}
