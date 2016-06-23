<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StorePostulanteRequest extends Request
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
/*        var_dump($this->all());
        die();*/
        return [
            //datos basicos
            'nombre' =>  'required|max:100|string',
            'ap_paterno' => 'required|max:100|string',
            'ap_materno' => 'required|max:100|string',
            'doc_identidad'=> 'required_if:nacionalidad,peruano', //| unique:persona,doc_identidad,NULL',
            'carnet_extranjeria'=> 'required_if:nacionalidad,extranjero',//  | unique:persona,carnet_extranjeria,NULL',
            'estado_civil'=>'required|exists:configuracion,id',
            //'correo'=>'required|string',
            //'puestoSelect' => 'required|exists:configuracion,id'

            //Nacimiento
            'fecha_nacimiento' => 'required | string',
            'departamento' => 'required_if:nacionalidad,peruano',
            'provincia' => 'required_if:nacionalidad,peruano',
            'distrito' => 'required_if:nacionalidad,peruano',
            'direccion_nacimiento' => 'required_if:nacionalidad,peruano',

            'pais_nacimiento'=>'required_if:nacionalidad,extranjero',
            'lugar_nacimiento'=>'required_if:nacionalidad,extranjero',

            //Vivienda            'puestoSelect' => 'required|exists:configuracion,id'
            'departamento_vivienda' => 'required|exists:departamento,id',
            'provincia_vivienda' => 'required|exists:provincia,id',
            'distrito_vivienda' => 'required|exists:distrito,id',
            'domicilio'=>'required',
            'referencia_vivienda'=>'required',

            //educacion
            'colegio_primario'=>'required|max:100|string',
            'colegio_secundario'=>'required|max:100|string',
            
            //Empleo
            'centro_trabajo'=>'required | string',
            'direccion_laboral'=>'required | string',

            //Contacto
            'telefono_celular'=>'required|string|max:12',
            'correo'=>'required|email'

            
            //'distrito' => 'required | exists:distrito,id',
            //solo pedira que se ingrese si es peruano ya en el store se registrara si el ingresado existe

        ];
    }


    public function messages()
    {
        return [
            'centro_trabajo.alpha_spaces' => 'El campo centro de trabajo  debe ser solo caracteres',
            'centro_trabajo.max'=>'El campo centro de trabajo  no puede superar la longitud de 100 caracteres',

            'direccion_laboral.string' => 'El campo direccion laboral debe ser solo caracteres',
            'direccion_laboral.max'=>'El campo direccion laboral no puede superar la longitud de 80 caracteres',
            
            'telefono_celular.required' => 'El campo teléfono celular es obligatorio ',
            'telefono_celular.string'=>'El campo teléfono celular debe tener formato válido',
            'telefono_celular.max'=>'El campo teléfono celular no puede ser mayor a 12 dígitos',

            'correo.required' => 'El campo correo es obligatorio',
            'correo.email'=>'El campo correo debe tener formato válido',
        ];
    }

}
