<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditTrabajadorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'fecha_nacimiento' => 'string',
            'doc_identidad'=> 'required_if:nacionalidad,Peruano',
            'carnet_extranjeria'=> 'required_if:nacionalidad,Extranjero',
            'correo'=>'required|string',
            'puestoSelect' => 'required|exists:configuracion,id'
        ];
    }
}
