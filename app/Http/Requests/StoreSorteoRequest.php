<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreSorteoRequest extends Request
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
            'nombre_sorteo'          =>  array('required','Regex:/[A-Za-z .-]/'),
            'descripcion'       =>  array('required','Regex:/[A-Za-z .-]/'),            
            'fecha_abierto'      =>  'required|date_format:d/m/Y|after:today',            
            'fecha_cerrado'      =>  'required|date_format:d/m/Y|after:fecha_abierto',
            'sedeSelec'      =>  'required'
        ];
    }
}
