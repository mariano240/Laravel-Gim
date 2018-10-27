<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class altaUsuarioRequest extends FormRequest
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
        return [
            'nombre' => 'required|alpha|string|max:65',
            'apellido' => 'required|alpha|string|max:65',
            'email' => 'required|string|email|max:100|unique:users',
            'telefono' => 'string|max:255',
            'dni' => 'required|numeric|unique:users',
            'calle' => 'required|string|max:65',
            'altura' => 'nullable|numeric|max:100000',
            'departamento' => 'nullable|string|max:6',
            'piso' => 'nullable|string|max:6',

            'idMembresia'=> 'required|numeric|exists:tipo_membresias,id',
            'idPromocion'=> 'nullable|numeric',
            'formaPago'=> 'required|string|max:255',
            'cantidadMeses'=> 'required|numeric|max:24',

        ];
    }
}
