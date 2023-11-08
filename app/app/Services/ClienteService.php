<?php

namespace App\Services;

use App\Models\Cliente;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class ClienteService
{
    public  function  all(): Collection{
        return Cliente::all();
    }

    public function create(Request $request) : Cliente{

        $cliente_novo = new Cliente();

        $cliente_novo->id = $request->id;
        $cliente_novo->nome_completo = $request->nome_completo;
        $cliente_novo->data_de_nascimento = $request->data_de_nascimento;
        $cliente_novo->email = $request->email;
        $cliente_novo->cpf = $request->cpf;
        $cliente_novo->endereco = $request->endereco;
        $cliente_novo->numero = $request->numero;
        $cliente_novo->complemento = $request->complemento;
        $cliente_novo->bairro = $request->bairro;
        $cliente_novo->cidade = $request->cidade;
        $cliente_novo->estado = $request->estado;
        $cliente_novo->cep= $request->cep;
        $cliente_novo->telefone= $request->telefone;
        $cliente_novo->genero= $request->genero;
        $cliente_novo->area_de_formacao= $request->area_de_formacao;

        $cliente_novo->save();

        return $cliente_novo;

    }

    public function update(Request $request, string $id){
        $cliente= Cliente::find($id);

        $cliente->id = $request->id;
        $cliente->nome_completo = $request->nome_completo;
        $cliente->data_de_nascimento = $request->data_de_nascimento;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep= $request->cep;
        $cliente->telefone= $request->telefone;
        $cliente->genero= $request->genero;
        $cliente->area_de_formacao= $request->area_de_formacao;


        $cliente->save();

        return $cliente;
    }

    public function delete(Cliente $cliente){

        $cliente->delete();
    }

}
