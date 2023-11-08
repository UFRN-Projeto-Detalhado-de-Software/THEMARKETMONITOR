<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct(private readonly ClienteService $clienteService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = $this->clienteService->all();

        return view('cliente.index',['cliente'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cliente/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationRules = [
            'nome_completo' => 'required',
            'data_de_nascimento' => 'required',
            'email' => 'required',
            'endereco' => 'nullable',
            'numero' => 'nullable',
            'bairro' => 'nullable',
            'complemento' => 'nullable',
            'cidade' => 'nullable',
            'estado' => 'nullable',
            'cep' => 'nullable',
            'telefone' => 'required',
            'genero' => 'nullable',
            'area_de_formacao' =>'nullable',
        ];
        $request->validate($validationRules);

        // Crie um array para armazenar mensagens sobre campos ausentes
        $missingFields = [];
        foreach ($validationRules as $field => $rule) {
            if (!$request->has($field)) {
                $missingFields[] = $field;
            }
        }

        // Se algum campo obrigatório estiver faltando, redirecione com uma mensagem de erro
        if (!empty($missingFields)) {
            return redirect()->back()->withErrors(['message' => 'Por favor, preencha todos os campos obrigatórios. Campos em falta: ' . implode(', ', $missingFields)]);
        }

        $this->clienteService->create($request);

        return redirect()->back()->with('message', 'Criado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        print($cliente);


        return view('cliente/show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view("cliente/edit", ['cliente' => $cliente, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->clienteService->update($request, $id);

        return redirect()->route('cliente.index')->with('message', 'Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $this->clienteService->delete($cliente);

        return redirect()->route('cliente.index')
            ->with('msg', 'Período destruido com sucesso!');
    }
}
