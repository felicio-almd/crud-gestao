<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gênero</title>
</head>
<body>
    <h1>Editar Gênero</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('generos.update', $genero->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="{{ $genero->nome }}"><br>
        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao" value="{{ $genero->descricao }}"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
