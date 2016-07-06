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
        $rules= [
            'nombre' =>'required|max:30|alpha_spaces',
            'numMax' =>'required|integer|min:0|max:100',
            'tarifa' =>'required|min:0|float',
        ];

        /*foreach($this->get('descuentos') as $key =>$val)
        {
            $rules['descuentos.'.$key]='required|min:0|float';
        }*/


        return $rules;
    }

    public function messages()
    {
        $messages = [
            'nombre.alpha_spaces'=>'El campo nombre solo puede contener caracteres.',
            'tarifa.float' => 'El campo tarifa debe ser un valor entero positivo',
            'numMax.integer' => 'El campo número de invitados debe ser un valor entero',
            'numMax.max'=>'El campo número de invitados no puede ser mayor a 100',
            'numMax.min'=>'El campo número de invitados no puede ser menor a 0'

        ];

        /*foreach($this->request->get('descuentos') as $key => $val)
        {
            $messages['descuentos.'.$key.'.required'] = 'El campo descuento  especial por familiar '.$key.' es obligatorio.';

             $messages['descuentos.'.$key.'.min'] = 'El campo descuento  especial  por familiar '.$key.' no puede ser menor a cero.';

            $messages['descuentos.'.$key.'.float'] = 'El campo descuento  especial  por familiar '.$key.' debe ser un valor númerico positivo.';
        }*/
        return $messages;        
    }
}
