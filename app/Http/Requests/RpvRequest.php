<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RpvRequest extends FormRequest
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
            
            'name'           => 'required',
            'cpf'            => 'min:11|required|numeric',
            'rpv_process'    => 'required',
            'origin_process' => 'required',
            'stick'          => 'required',
            'contact'        => 'required',
            'process_type'   => 'required',
            'deposit_date'   => 'required',
            'moviment'       => 'required',
            'bank'           => 'required',
            'docs'           => 'required'
        ];
    }

    public function messages()
    {
        return [

            'name.required'           => "O campo nome é obrigatório", 
            'cpf.min'                 => "Digite um cpf válido",
            'cpf.required'            => "O campo cpf é Obrigatório",
            'cpf.numeric'             => "Digite um cpf válido",
            'rpv_process.required'    => "O campo processo rpv é obrigatório",
            'origin_process.required' => "O campo orrigem do processo é obrigatório",
            'stick.required'          => "O campo vara é obrigatório",
            'contact.required'        => "O campo contato é obrigatório",
            'process_type.required'   => "O campo tipo do processo é obrigatório",
            'deposit_date.required'   => "A data do deposito é obrigatória",
            'moviment.required'       => "O campo movimentação é obrigatório",
            'bank.required'           => "O campo banco é obrigatório",
            'docs.required'           => "Os documentos são obrigatórios"
        ];
    }
}
