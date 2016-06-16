<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreConfiguracionRequest extends Request
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
            'valor'            =>  'required|string|unique:configuracion,valor,NULL',
            'grupo'            =>  'integer',            
            'descripcion'      =>  'max:100|string'                     
        ];
    }
}
