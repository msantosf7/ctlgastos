<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileFormRequest extends FormRequest
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

        $id = auth()->user()->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'rua' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'bairro' => ['string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'complemento' => ['string', 'max:255'],
            'imagem' => ['image', 'mimes:jpg,png,jpeg,gif,svg'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //Rule::unique('users')->ignore($id)],
            'password' => ['max:100'],
        ];
    }
}
