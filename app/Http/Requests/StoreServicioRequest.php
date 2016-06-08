<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreServicioRequest extends Request
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
            'nombre'       =>  'required|max:100|string',
            'descripcion'  =>  'required|max:100|string',
            'tipo_servicio'=>  'required|max:50|string',
            
            'trabajador' => '|max:100|string',
            'postulante'=> 'required|max:100|string',
            'tercero'=> '|max:100|string',
        ];
    }
}
