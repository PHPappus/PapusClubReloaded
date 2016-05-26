<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditActividadRequest extends Request
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
            'capacidad_maxima'  =>  'integer|min:1',
            'descripcion'         =>  'required|max:100|string',   
        ];
    }
}
