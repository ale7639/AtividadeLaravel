@extends('layout')
@section('content')
    <h2>Editar Categoria</h2>
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
    
    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
@endsection