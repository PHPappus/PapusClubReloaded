<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreReservaBungalowAdminR extends Request
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
            'tipo_comprobante' => 'required',
            'fecha_inicio_reserva'            =>  'required',
            'fecha_fin_reserva'     =>  'required',
            //'id_persona' =>  'required',

        ];
    }
}
