<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Gêneros</title>
</head>
<body>
    <h1>Listagem de Gêneros</h1>
    <a href="{{ route('generos.create') }}">Adicionar Novo Gênero</a>
    <ul>
        @foreach($genero as $genre)
            <li>{{ $genre->nome }} - {{ $genre->descricao }} 
                <a href="{{ route('generos.edit', $genre->id) }}">Editar</a>
                <form action="{{ route('generos.delete', $genre->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
            <li>
           
            </li>
        @endforeach    
    </ul>
    <a href="{{ route('livros.index') }}">Voltar para a página de livros</a>
</body>
</html>
