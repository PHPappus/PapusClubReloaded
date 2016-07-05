<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreFacturacionRequest extends Request
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
            'persona_id'   =>  'required|integer|exists:persona,id',
            'tipo_pago'   =>  'required|string|max:255',
            'tipo_comprobante' =>  'required|string|max:255',
            'estado'        =>  'required|string|max:255'            
        ];
    }
}
