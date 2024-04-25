<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    private $livros;
    private $generos;

    public function __construct(Livro $livro, Genero $genero)
    {
        $this->livros = $livro;
        $this->generos = $genero;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = $this->livros->all();
        return view('livros-index', compact('livros'));
    }


    public function create()
    {
        $generos = $this->generos->all();
        return view('livros-create', compact('generos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'paginas' => 'required|integer',
            'estoque' => 'required|integer',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $data = $request->all();
        $this->livros->create($data);
        return redirect()->route('livros.index')->with('success', 'Livro criado');
    }


    public function show($id)
    {
        $livro = $this->livros->find($id);
        $livro = $livro->load('livro');

        return response()->json($livro);
    }


    public function edit($id)
    {
        $livro = $this->livros->find($id);
        $generos = $this->generos->all();

        return view('livros-edit', compact('livro', 'generos'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'paginas' => 'required|integer',
            'estoque' => 'required|integer',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $data = $request->all();
        $livro = $this->livros->find($id);

        $livro->update($data);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado');
    }

    public function destroy($id)
    {
        $livro = $this->livros->find($id);
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro deletado');
    }
}