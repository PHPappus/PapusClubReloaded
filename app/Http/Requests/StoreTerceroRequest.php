<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreTerceroRequest extends Request
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
            'nombre' =>  'required|max:100|string',
            'ap_paterno' => 'required|max:100|string',
            'ap_materno' => 'required|max:100|string',
            'fecha_nacimiento' => 'required | string',
            'doc_identidad'=> 'required_if:nacionalidad,peruano', //| unique:persona,doc_identidad,NULL',
            'carnet_extranjeria'=> 'required_if:nacionalidad,extranjero',//  | unique:persona,carnet_extranjeria,NULL',
            'correo'=>'required|string'
        ];
    }
}
