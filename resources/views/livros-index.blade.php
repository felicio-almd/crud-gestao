<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
</head>
<body>
    <h1>Listagem de Livros</h1>
    <a href="{{ route('livros.create') }}">Adicionar Novo Livro</a>
    <ul>
        @foreach($livros as $livro)
            <li>{{ $livro->nome }} - Páginas: {{ $livro->paginas }}, Estoque: {{ $livro->estoque }}
                <a href="{{ route('livros.edit', $livro->id) }}">Editar</a>
                <form action="{{ route('livros.delete', $livro->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
