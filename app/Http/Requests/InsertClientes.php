<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertClientes extends FormRequest
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
            'id_tipodoc'            =>'required',
            'num_documento'         =>'required|min:1|max:25',
            'nombre'                =>'required|min:1|max:40',
            'apellidos'             =>'required|min:1|max:40',
            'sexo_id'               =>'required',
            'nacionalidad_id'       =>'required',
            'departamento_id'       =>'required',
            'ciudad_id'             =>'required',
            'fecha_nacimiento'      =>'required|date_format:Y-m-d',
            'grupoSanguineo_id'     =>'required',
            'direccion_res'         =>'required|min:1|max: 100',  
            'telefonos_user'        =>'required|min:1|max:60',
            'email_user'            =>'min:0|max:50',
            'fecha_creacion'        =>'required|date_format:Y-m-d',

        ];
    }

    /*
                $table->id();



            $table->softDeletes();
            $table->timestamps();
    */
    public function attributes()
    {
        return [
        //    'tipo_documento' =>"Tipo de documento",
        ];
    }
    
    public function messages()  //personalizar mensajes
    {
        return ['num_documento.required' => 'Debe ingresar número de documento de identidad',
                'num_documento.max' => 'No debe ingresar más de 30 caracteres',
        ];
    }
}
