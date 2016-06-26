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
/*        var_dump($this->all());
        die();*/
        return [
            'colegio_primario'=>'required|alpha_spaces|max:100',
            'colegio_secundario'=>'required|alpha_spaces|max:100',
            'universidad'=>'alpha_spaces|max:80',
            'carrera'=>'alpha_spaces|max:80'
        ];
    }

    public function messages()
    {
        return [
            'colegio_primario.required' => 'El campo colegio primaria es obligatorio',
            'colegio_primario.alpha_spaces' => 'El campo colegio primaria debe ser solo caracteres',
            'colegio_primario.max'=>'El campo colegio primaria no puede superar la longitud de 100 caracteres',

            'colegio_secundario.required' => 'El campo colegio secundaria es obligatorio',
            'colegio_secundario.alpha_spaces' => 'El campo colegio secundaria debe ser solo caracteres',
            'colegio_secundario.max'=>'El campo colegio secundaria no puede superar la longitud de 100 caracteres',

            'universidad.alpha_spaces' => 'El campo universidad debe ser solo caracteres',
            'universidad.max'=>'El campo universidad no puede superar la longitud de 80 caracteres',

            'carrera.alpha_spaces' => 'El campo carrera debe ser solo caracteres',
            'carrera.max'=>'El campo carrera no puede superar la longitud de 80 caracteres'
        ];
    }
}
