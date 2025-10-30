@extends('layout')
@section('content')
    <h2>Nova Categoria</h2>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection