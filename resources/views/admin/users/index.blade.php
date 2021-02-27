@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus Usuários
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $u->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                        @if($loggedId !== intval($u->id))
                        <form class="d-inline" method="POST" action="{{ route('users.destroy', ['user' => $u->id]) }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir?');">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{$users->links()}}

@endsection