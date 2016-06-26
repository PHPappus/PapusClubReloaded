<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;
use papusclub\Models\TipoPersona;

class StoreTallerRequest extends Request
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

        

        $rules = [

            'nombre' => 'required|max:60|string',
            'descripcion' =>'|max:200|string',
<<<<<<< HEAD
            'profe' => 'required|max:60|string',
=======
            'profesor' => 'required|max:60|string',
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
            'vacantes' =>'min:0',
            'fecIniIns' => 'required',
            'fecFinIns' => 'required',
            'fecIni' => 'required',
            'fecFin' => 'required',
            'cantidad_sesiones' => 'min:0',
        ];

        foreach($this->get('tarifas') as $key =>$val)
        {
            $rules['tarifas.'.$key]='required|min:0|float';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'fecIniIns.required' => 'El campo fecha inicio de inscripciones es obligatorio',
            'fecFinIns.required' => 'El campo fecha fin de inscripciones es obligatorio',
            'fecIni.required'=> 'El campo fecha inicio de taller es obligatorio',
            'fecFin.required'=>'El campo fecha fin de taller es obligatorio'
        ];
    }
}