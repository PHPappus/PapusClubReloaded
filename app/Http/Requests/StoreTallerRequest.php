<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreTallerRequest extends Request
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
            'descripcion' =>'required|max:200|string',
            'vacantes' =>'min:0',
            'cantidad_sesiones' => 'min:0',
        ];
    }
}