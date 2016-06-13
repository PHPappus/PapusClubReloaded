<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StorePostulanteRequest extends Request
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
/*        var_dump($this->all());
        die();*/
        return [
            'nombre' =>  'required|max:100|string',
            'ap_paterno' => 'required|max:100|string',
            'ap_materno' => 'required|max:100|string',
            'doc_identidad'=> 'required_if:nacionalidad,peruano', //| unique:persona,doc_identidad,NULL',
            'carnet_extranjeria'=> 'required_if:nacionalidad,extranjero',//  | unique:persona,carnet_extranjeria,NULL',
            //'correo'=>'required|string',
            //'puestoSelect' => 'required|exists:configuracion,id'
            'educacion_primaria'=>'required|max:100|string',
            'educacion_secundaria'=>'required|max:100|string',
            'fecha_nacimiento' => 'required | string',
            'direccion_nacimiento' => 'required | string',
            'centro_trabajo'=>'required | string',
            'direccion_laboral'=>'required | string',

            //'distrito' => 'required | exists:distrito,id',
            'departamento' => 'required_if:nacionalidad,peruano, exists:departamento,id',
            'provincia' => 'required_if:nacionalidad,peruano , exists:provincia,id'  ,
            'distrito' => 'required_if:nacionalidad,peruano , exists:distrito,id'
        ];
    }
}
