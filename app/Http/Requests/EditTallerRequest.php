<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditTallerRequest extends Request
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
<<<<<<< HEAD
            'descripcion' =>'|max:200|string',
            'profe' => 'required|max:60|string',
=======
            'descripcion' =>'required|max:200|string',
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
}
