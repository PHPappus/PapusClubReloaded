<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditSocioTrabajoRequest extends Request
{
    protected $errorBag = 'trabajo';
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
            'centrotrabajo'=>'alpha_spaces|max:100',
            'cargocentrotrabajo'=>'alpha_spaces|max:100',
            'direccionlaboral'=>'string|max:150'
        ];
    }

    public function messages()
    {
        return [
            'centrotrabajo.alpha_spaces' => 'El campo centro de trabajo  debe ser solo caracteres',
            'centrotrabajo.max'=>'El campo centro de trabajo  no puede superar la longitud de 100 caracteres',

            'cargocentrotrabajo.alpha_spaces' => 'El campo cargo en centro de trabajo  debe ser solo caracteres',
            'cargocentrotrabajo.max'=>'El campo cargo en centro de trabajo no puede superar la longitud de 100 caracteres',

            'direccionlaboral.string' => 'El campo direccion laboral debe ser solo caracteres',
            'direccionlaboral.max'=>'El campo direccion laboral no puede superar la longitud de 80 caracteres',
        ];
    }
}
