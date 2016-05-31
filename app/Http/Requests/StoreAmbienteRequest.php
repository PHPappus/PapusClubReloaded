<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreAmbienteRequest extends Request
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
            'nombre'            =>  'required|max:100|string',
            'tipo_ambiente'     =>  'required|max:100|string',
            //'sede_id'           =>  'required',
            'capacidad_actual'  =>  'integer|min:1',
            'ubicacion'         =>  'required|max:100|string',          
        ];
    }
}
