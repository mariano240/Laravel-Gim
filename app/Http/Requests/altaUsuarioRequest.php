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
            'altura' => 'numeric|max:6',
            'departamento' => 'string|max:6',
            'piso' => 'string|max:6'
        ];
    }
}
