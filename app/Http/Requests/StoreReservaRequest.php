<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreReservaRequest extends Request
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
            'estadoReserva'            =>  'required|max:100|string',
            'precio'  =>  'required|double|min:1',
        ];
    }
}
