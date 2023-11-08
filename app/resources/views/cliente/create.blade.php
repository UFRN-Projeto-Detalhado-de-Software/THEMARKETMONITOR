@extends('layouts.main')

@section('title', 'Vendas')

@section('content')

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif


    <div class="content">
        <h1>Crie um Cliente</h1>

        <form action="{{route('cliente.store')}}" method="POST">
            @csrf

            <p>
                <label>
                    Nome Completo do Cliente
                    <input type="text" name="nome_completo" required  placeholder="Nome Completo do Cliente">
                </label>
            </p>



            <p>
                <label>
                    E-mail do Cliente
                    <input type="text" name="email" required placeholder="E-mail do Cliente">
                </label>
            </p>

            <p>
                <label>
                    CPF do Cliente
                    <input type="text" name="cpf" required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"   placeholder="CPF do Cliente">
                </label>
            </p>
            <p>
                <label>
                    CEP
                    <input type="text" name="cep" id="cep" placeholder="cep do endereço do cliente">
                    <button type="button" onclick="buscarCep()">Buscar Endereço</button>
                </label>

            </p>

            <p>
                <label>
                    Endereço do Cliente
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço do Cliente">
                </label>
            </p>







            <p>
                <label>
                    bairro
                    <input type="text" name="bairro" id="bairro" placeholder="bairro do cliente">
                </label>
            </p>

            <p>
                <label>
                    cidade
                    <input type="text" name="cidade" id="cidade" placeholder="cidade do cliente">
                </label>
            </p>

            <p>
                <label>
                    Estado
                    <input type="text" name="estado" id="estado" placeholder="estado do cliente">
                </label>
            </p>
            <p>
                <label>
                    numero
                    <input type="text" name="numero"  placeholder="numero da rua do cliente">
                </label>
            </p>

            <p>
                <label>
                    Complemento
                    <input type="text" name="complemento"  placeholder="complemento do endereço do cliente">
                </label>
            </p>
            <p>


            <p>
                <label>
                    Telefone
                    <input type="text" name="telefone" required placeholder="telefone do cliente">
                </label>
            </p>

            <p>
                <label>
                    Genero
                    <select name="genero">
                        <option value="" selected>Selecione o gênero</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </label>
            </p>

            <p>
                <label>
                    area de formação
                    <input type="text" name="area_de_formacao"  placeholder="area de formacao  do cliente">
                </label>
            </p>

            <p>
                <label>
                    data de nascimento
                    <input type="date" name="data_de_nascimento" required placeholder="data de nascimento  do cliente">
                </label>
            </p>

            <input type="submit" value="Enviar">
        </form>

        <a class="btn btn-primary" href="{{route('cliente.index')}}"> Voltar</a>
    </div>

    <script>
        function buscarCep() {
            var cep = document.getElementById('cep').value;
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('endereco').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    } else {
                        alert('CEP não encontrado. Por favor, verifique o CEP inserido.');
                    }
                })
                .catch(error => console.error(error));
        }

    </script>

    @endsection


