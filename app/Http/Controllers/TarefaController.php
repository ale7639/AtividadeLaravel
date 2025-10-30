<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Categoria; 
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::with('categoria')->get(); 
        return view('tarefas.index', ['tarefas' => $tarefas]);
    }

    public function create()
    {
        $categorias = Categoria::all(); 
        return view('tarefas.create', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id', 
        ]);
        Tarefa::create($request->all());
        return redirect()->route('tarefas.index');
    }

    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::all();
        return view('tarefas.edit', ['tarefa' => $tarefa, 'categorias' => $categorias]);
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        
        
        $data = $request->all();
        $data['status_concluida'] = $request->has('status_concluida') ? 1 : 0;

        $tarefa->update($data);
        return redirect()->route('tarefas.index');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }
}