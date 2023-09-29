<html>
<head></head>
<body>
<h1>Editar funcionários:</h1>

<form action="{{route('periodo.edit', ['periodo' => $periodo->id])}}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label>
            Início:
            <input type="date" id="data_inicio" name="data_inicio" value="{{$periodo->data_inicio}}">
        </label>
    </p>
    <p>
        <select class="form-select" aria-label="Default select example" name="tipo">
            <option selected>Escolha o tipo do período</option>
            @foreach($tipos as $tipo)
                <option value="{{$tipo->id}}"> {{$tipo->nome}} </option>
            @endforeach
        </select>
    </p>
    <input type="submit" value="Enviar">
</form>


<br>



</body>
</html>
