<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreReservaOtroAmbienteAdminR extends Request
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
<<<<<<< HEAD
            'fecha_inicio_reserva'    =>  'required',
=======
            'fecha_inicio_reserva'            =>  'required',
            'fecha_fin_reserva'     =>  'required',
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
            'hora_inicio_reserva'    =>  'required',
            'hora_fin_reserva'    =>  'required',
        ];
    }
}
