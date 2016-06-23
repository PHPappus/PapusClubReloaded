<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreFamiliarRequest extends Request
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
        /*Probar aqui que datos esta pasando para saber si se cae por alguna variable*/
/*                var_dump($this->all());
        die();*/
        return [
            'nombre' =>  'required|max:100|alpha_spaces',
            'ap_paterno' => 'required|max:100|alpha',
            'ap_materno' => 'required|max:100|alpha',
            'doc_identidad'=> 'required_if:nacionalidad,peruano', //| unique:persona,doc_identidad,NULL',
            'carnet_extranjeria'=> 'required_if:nacionalidad,extranjero',//  | unique:persona,carnet_extranjeria,NULL',
            'correo'=>'email',
            'tipo_relacion'=> 'required|exists:configuracion,id',

            'fecha_nacimiento'=>'required|string',
            ];
    }

    public function messages()
    {
        return [
            'nombre.alpha_spaces'=>'El campo nombre debe estar conformado por solo caracteres',

            'ap_paterno.required'=> 'El campo apellido paterno es obligatorio',
            'ap_paterno.max'=>'El campo apellido paterno debe contener 100 caracteres como máximo.',
            'ap_paterno.alpha'=>'El campo apellido paterno debe estar conformado por solo caracteres',

            'ap_materno.required'=>'El campo apellido materno es obligatorio',
            'ap_materno.max'=>'El campo apellido materno debe contener 100 caracteres como máximo.',
            'ap_materno.alpha'=>'El campo apellido materno debe estar conformado por solo caracteres',
        ];
    }
}
