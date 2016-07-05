<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditMultaRequest extends Request
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

      //  var_dump($this->all());
       //    die();       
        return [
            'nombre' => 'required|max:30|string',
            'descripcion' =>'max:100|string',
            'montoPenalidad' =>'min:0',
        ];
    }
}
