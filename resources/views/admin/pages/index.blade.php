@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas Páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">ID</th>
                    <th>Título</th>
                    <th width="200px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->title}}</td>
                    <td>
                        <a href="" target="_blank" class="btn btn-sm btn-success">Ver</a>

                        <a href="{{ route('pages.edit', ['page' => $p->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{ route('pages.destroy', ['page' => $p->id]) }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir?');">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $pages->links() }}

@endsection