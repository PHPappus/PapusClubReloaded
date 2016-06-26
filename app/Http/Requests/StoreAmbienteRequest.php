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
            'nombre'            =>  'required|max:100|string|unique:ambiente,nombre,NULL',
<<<<<<< HEAD
            'tipo_ambiente'     =>  'required',
            'capacidad_actual'  =>  'required|integer|min:0',
=======
            'tipo_ambiente'     =>  'required|max:100|string',
            'capacidad_actual'  =>  'integer|min:0',
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
            'descripcion'         =>  'required|max:100|string',          
        ];
    }
}
