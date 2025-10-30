@extends('layout')
@section('content')
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categorias</h2>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary"
        >Nova Categoria</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->nome }}</td>
                <td class="text-end">
                    <a href="{{ route('categorias.edit', $cat) }}"  class="btn btn-primary btn-sm">Editar</a>
                    
                    <form action="{{ route('categorias.destroy', $cat) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                        >Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection