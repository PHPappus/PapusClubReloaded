<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditPostulanteEstudioRequest extends Request
{


    protected $errorBag = 'estudio';

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
            'colegio_primario' =>'required|alpha_spaces|max:100',
            'colegio_secundario' =>'required|alpha_spaces|max:100',
            'universidad' =>'required|alpha_spaces|max:100',
            'profesion' =>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'colegio_primario.required' => 'El campo colegio primario es obligatorio',
            'colegio_primario.alpha_spaces' => 'El campo colegio primario debe ser solo caracteres',
            'colegio_primario.max'=>'El campo colegio primario no puede superar la longitud de 100 caracteres',
            
            'colegio_secundario.required' => 'El campo colegio secundario es obligatorio',
            'colegio_secundario.alpha_spaces' => 'El campo colegio secundario debe ser solo caracteres',
            'colegio_secundario.max'=>'El campo colegio secundario no puede superar la longitud de 100 caracteres',
        ];
    }
}
