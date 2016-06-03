<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreActividadRequest extends Request
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
            'tipo_actividad'     =>  'required|max:100|string',
            'capacidad_maxima'  =>  'required|integer|min:1',
            'descripcion'         =>  'max:100|string',
            'cant_ambientes'    => 'required|min:1',
        ];
    }
}
