<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreMembresiaRequest extends Request
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
            'nombre' =>'required|max:30|alpha',
            'numMax' =>'required|integer|min:0|max:100',
            'tarifa' =>'required|min:0|float',
        ];
    }

    public function messages()
    {
        return [
            'tarifa.float' => 'El campo tarifa debe ser un valor entero positivo',
            'numMax.integer' => 'El campo número de invitados debe ser un valor entero',
            'numMax.max'=>'El campo número de invitados no puede ser mayor a 100',
            'numMax.min'=>'El campo número de invitados no puede ser menor a 0'

        ];
    }
}
