<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class insertClientesServicios extends FormRequest
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
            // 'id_tipodoc'            => 'required',
            // 'tipo_usuario'          => 'required', 
            // 'tipo_servicios'        => 'required',               

            'nombre_acompanante'    => 'required|min:1|max:60',
            'telefono_acompanante'  => 'required|min:1|max:30',
            'email_acompanante'     => 'min:0|max:50',

            'instituto_remitente'   => 'required',
            'medico_remitente'      => 'required|min:1|max:60',
            'tipo_afiliacion'       => 'required',
            'grupo_rango_eps'       => 'required',
            'cubiculo'              => 'required',

            'fecha_ingreso'         => 'required|date_format:Y-m-d',
            'fecha_retiro'          => 'date_format:Y-m-d',
            'cuidador_recibe'       => 'required',
            'num_factura'           => 'min:0|max:20',
            'fecha_factura'         => 'date_format:Y-m-d',
        ];
    }
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
