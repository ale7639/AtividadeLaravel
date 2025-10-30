@extends('layout')
@section('content')
    <h2>Editar Tarefa</h2>
    <hr>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $tarefa->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao', $tarefa->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
                        <select  class="form-select" id="categoria_id" name="categoria_id" required>
                <option value="">Selecione...</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
        </div>

<div class="mb-3">
    <label class="form-label">Status:</label> <div class="form-check"> 
        <input type="checkbox" class="form-check-input" id="status_concluida" name="status_concluida" value="1" 
            {{ $tarefa->status_concluida ? 'checked' : '' }}>
        <label class="form-check-label" for="status_concluida">
            Marcar como Concluída
        </label>
    </div>
</div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
@endsection