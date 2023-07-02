<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStore extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_tipodoc' => 'required',
            'num_documento'=> 'required|min:1|max:30',
            'apellido1'=>'required|min:1|max:30',
            'nombre1'=>'required|min:1|max:30',
            'sexo_id'=>'required',
            'fecha_nacimiento'=>'required|date_format:Y-m-d',
            'direccion_res'=>'required|min:1|max:150',
            'telefonos'=>'required|min:1|max:60',
            'contacto_familiar'=>'required|min:1|max:150',
            'estado_cliente'=>'required'          
        ];
    }
}
