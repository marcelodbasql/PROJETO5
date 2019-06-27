<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Demandas extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'unidade' => 'required',
            'orgao' => 'required',
            'apontamento' => 'required',
            'gestor' => 'required',
            'responsavel' => 'required',
            'status' => 'required',
            'recebimento' => 'required',
            'prazo' => 'required',            
        ];
    }

    public function messages($id = '') {
        return [
            'unidade.required' => 'Você precisa informar a únidade!',
            'orgao.required' => 'Você precisa informar o orgão!',
            'apontamento.required' => 'Você precisa informar o apontamento!',
            'gestor.required' => 'Você precisa informar o gestor!',
            'responsavel.required' => 'Você precisa informar o responsável!',
            'status.required' => 'Você precisa informar o status!',
            'recebimento.required' => 'Você precisa informar a data de recebimento!',
            'prazo.required' => 'Você precisa informar o prazo final!',
        ];
    }
}
