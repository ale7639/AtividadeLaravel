@extends('layout')
@section('content')
    <h2>Nova Tarefa</h2>
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <div>
            <label>Título:</label>
            <input type="text" name="titulo" required>
        </div>
        <div>
            <label>Descrição:</label>
            <textarea name="descricao"></textarea>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="categoria_id" required>
                <option value="">Selecione...</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection