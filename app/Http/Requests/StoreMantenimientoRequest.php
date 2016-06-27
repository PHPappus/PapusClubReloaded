<?php

namespace papusclub\Http\Requests;
use papusclub\Http\Requests\Request;

class StoreMantenimientoRequest extends Request
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
            'fecha_abierto'                =>  'required',
            'fecha_cerrado'=>'required',
            'sedeSelec'=>'required'
        ];
    }
}
