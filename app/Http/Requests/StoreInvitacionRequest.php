<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreInvitacionRequest extends Request
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
            'sede'=>'required|not_in:-1|exists:sede,id',
            'fecha_invitacion' =>'required|string',
            'inv'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'inv.required'=>'Es necesario que se seleccione al menos un invitado de su lista.'
        ];
    }
}
