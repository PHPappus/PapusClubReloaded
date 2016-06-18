<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditPostulanteBasicoRequest extends Request
{


    protected $errorBag = 'basico';

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
            'nombre' =>'required|alpha_spaces|max:100',
            'apellidoPat' =>'required|alpha_spaces|max:100',
            'apellidoMat' =>'required|alpha_spaces|max:100',
            'fecha_nacimiento' =>'required|string',
            'doc_identidad'=> 'required_if:nacionalidad,peruano', //| unique:persona,doc_identidad,NULL',
            'carnet_extranjeria'=> 'required_if:nacionalidad,extranjero',//  | unique:persona,carnet_extranjeria,NULL',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.alpha_spaces' => 'El campo nombre debe ser solo caracteres',
            'nombre.max'=>'El campo nombre no puede superar la longitud de 100 caracteres',
            
            'apellidoPat.required' => 'El campo apellido paterno es obligatorio',
            'apellidoPat.alpha_spaces' => 'El campo apellido paterno debe ser solo caracteres',
            'apellidoPat.max'=>'El campo apellido paterno no puede superar la longitud de 100 caracteres',

            'apellidoMat.required' => 'El campo apellido materno es obligatorio',
            'apellidoMat.alpha_spaces' => 'El campo apellido materno debe ser solo caracteres',
            'apellidoMat.max'=>'El campo apellido materno no puede superar la longitud de 100 caracteres',
            
            'fecha_nacimiento.required'=>'El campo  fecha de nacimiento es obligatorio',
            'fecha_nacimiento.string'=>'El campo fecha de nacimiento debe tener formato valido'
        ];
    }
}
