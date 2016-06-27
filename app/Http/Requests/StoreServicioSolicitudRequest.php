<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreServicioSolicitudRequest extends Request
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
            'tipo_pago'  =>  'required|max:400|string',
            'tipo_comprobante'  =>  'required|max:400|string',
            'estadofactura'  =>  'required|max:400|string',
            'password'  =>  'required|max:400|string',
        ];
    }
}