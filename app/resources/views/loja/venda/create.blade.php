@extends('layouts.mainloja')

@section('title', 'Vendas')

@section('content')


    <div class="content">
        <h2> Criar a Venda </h2>

        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif

        <form action="{{route('loja.store')}}" method="post">
            @csrf
            <input type="date" name="data" required placeholder="data da venda">
            <input type="number" name="valor" required placeholder="valor da venda">
            <select name="meioDePagamento" required id="id" >
                <option value="" selected>Escolha um meio de pagamento</option>
                <option value="0">Nenhum</option>
                @foreach($meiopagamento as $meio)
                    <option value="{{ $meio->id }}">{{ $meio->nome_meiopagamento}}</option>
                @endforeach
            </select>
            <input type="number" name="cliente" required placeholder="cpf cliente">
            <select name="produto" required id="id" >
                <option value="" selected>Escolha uma peça de roupa</option>
                <option value="0">Nenhum</option>
                @foreach($produto as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name}}</option>
                @endforeach
            </select>
            <select name="closer" required id="id" >
                <option value="" selected>Escolha um Vendedor</option>
                <option value="0">Nenhum</option>
                @foreach($closer as $id => $nome)
                    <option value="{{ $id }}">{{ $nome }}</option>
                @endforeach
            </select>

            <select name="tipo" required id="id" >
                <option value="" selected>Escolha o tipo da venda</option>
                <option value="0">Nenhum</option>
                @foreach($tipovenda as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nome_tipo}}</option>
                @endforeach
            </select>
            <select name="origem" required id="id" >
                <option value="" selected>Escolha uma origem de venda</option>
                <option value="0">Nenhum</option>
                @foreach($origemdavenda as $origem)
                    <option value="{{ $origem->id }}">{{ $origem->nome_origem}}</option>
                @endforeach
            </select>
            <select name="deTerceiro" required  >
                <option value="" selected>É DE TERCEIRO</option>

                <option value="0">Não</option>
                <option value="1">Sim</option>

            </select>
            <input type="text" name="obs" placeholder="observação">
            <button type="submit">Criar a Venda</button>
        </form>
    </div>




@endsection
