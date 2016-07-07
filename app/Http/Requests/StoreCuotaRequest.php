<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreCuotaRequest extends Request
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
            'nombre' => 'required|max:30|string',
            'motivo' =>'max:100|string',
            'monto' =>'required|min:0|float',
            'ch' => 'required'
        ];
    }
}
