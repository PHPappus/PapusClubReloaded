<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class RegistrarPagoMembresiaRequest extends Request
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
            'monto'=>'required|min:0|float',
            'tipo_pago_id'=>'required|not_in:-1',
            'comprobante'=>'required|not_in:-1',
            'numero'=>'required|integer',
            'descripcion'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'monto.float' =>'El monto ingresado debe ser de tipo númerico o decimal.',
            'tipo_pago_id.not_in'=>'El rango elegido para el tipo de pago no es válido.',
            'comprobante.not_in'=>'El rango elegido para el comprobante no es válido.',
        ];
    }    
}
