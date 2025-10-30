@extends('layout')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Minhas Tarefas</h2>
        <a href="{{ route('tarefas.create') }}" class="btn btn-primary"
        >Nova Tarefa</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Concluido</th>
                <th>Título</th>
                <th>Categoria</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($tarefas as $task)
            <tr>
                <td>
                    @if($task->status_concluida)
                        <span >Concluída</span>
                    @else
                        <span>Pendente</span>
                    @endif
                </td>
                <td>
                    {{ $task->status_concluida ? '':'' }}
                    {{ $task->titulo }}
                    {{ $task->status_concluida ? '':'' }}
                </td>
                <td>
                    <span>{{ $task->categoria->nome }}</span>
                </td>
                <td class="text-end">
                    <a href="{{ route('tarefas.edit', $task) }}" class="btn btn-primary">Editar</a>
                    
                    <form action="{{ route('tarefas.destroy', $task) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                        >Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Nenhuma tarefa encontrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection