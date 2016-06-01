<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreTrabajadorRequest extends Request
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
            'fecha_nacimiento' => 'required|string',
            'doc_identidad'=> 'string',
            'carnet_extranjeria'=>'string',
            'correo'=>'string'
        ];
    }
}
