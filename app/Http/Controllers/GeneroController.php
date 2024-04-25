<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    private $generos;

    public function __construct(Genero $genero)
    {
        $this->generos = $genero;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genero = $this->generos->all();
        return view('generos-index', compact('genero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $data = $request->all();
        $this->generos->create($data);
        return redirect()->route('generos.index')->with('success', 'Genero adicionado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genero = $this->generos->find($id);
        return response()->json($genero);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genero = $this->generos->find($id);
        return view('generos-edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $genero = $this->generos->find($id);

        $genero->update($data);
        return redirect()->route('generos.index')->with('success', 'Genero atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genero = $this->generos->find($id);
        $genero->delete();
        return redirect()->route('generos.index')->with('success', 'Genero deletado');
    }
}
