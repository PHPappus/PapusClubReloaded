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
            'sedeSelec'         =>  'required',
            'nombre'            =>  'required|max:100|string',
            'tipo_ambiente'     =>  'required',
            'capacidad_actual'  =>  'required|integer|min:0',
            'descripcion'         =>  'required|max:100|string',          
        ];
    }
}
