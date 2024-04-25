<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Livro</title>
</head>
<body>
    <h1>Criar Livro</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('livros.index') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="paginas">Número de Páginas:</label><br>
        <input type="number" id="paginas" name="paginas"><br>
        <label for="estoque">Quantidade em Estoque:</label><br>
        <input type="number" id="estoque" name="estoque"><br>
        <label for="genero_id">Gênero:</label><br>
        <select name="genero_id" id="genero_id">
            @foreach($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
            @endforeach
        </select><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
