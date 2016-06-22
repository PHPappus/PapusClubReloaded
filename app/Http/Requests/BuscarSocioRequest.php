<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class BuscarSocioRequest extends Request
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
            'sede'=>'required|not_in:-1',
            'numero_carnet'=>'required|integer'
        ]; 
    }
}
