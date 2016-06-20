<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditSocioBasicoRequest extends Request
{


    protected $errorBag = 'basico';

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
            'nombre' =>'required|alpha_spaces|max:100',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.alpha_spaces' => 'El campo nombre debe ser solo caracteres',
            'nombre.max'=>'El campo nombre no puede superar la longitud de 100 caracteres',
        ];
    }
}
