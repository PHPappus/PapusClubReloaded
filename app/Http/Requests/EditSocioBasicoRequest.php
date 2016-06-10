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
            'nombre' =>'required|alpha|max:100',
            'fecha_nacimiento' =>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.alpha' => 'El campo nombre debe ser solo caracteres',
            'nombre.max'=>'El campo nombre no puede superar la longitud de 100 caracteres',
            'fecha_nacimiento.required'=>'El campo  fecha de nacimiento es obligatorio',
            'fecha_nacimiento.string'=>'El campo fecha de nacimiento debe tener formato valido'
        ];
    }
}
