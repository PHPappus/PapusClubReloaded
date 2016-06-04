<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreTarifarioServicioRequest extends Request
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
    'idservicio'    =>  'required|integer',
    'idtipopersona' =>  'required|integer',
    'descripcionparafecha' =>  'required|max:100|string',    
    'precio' =>  'required',.
    'estado' =>  'required.',
     ];
    }
}

