<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreTraspasoRequest extends Request
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
            'nombre' => 'required|max:60|string',
            'apP' => 'required|max:60|string',
            'apM' => 'required|max:60|string',
            'dni' => 'required|integer|min:0',
        ];
    }
}
