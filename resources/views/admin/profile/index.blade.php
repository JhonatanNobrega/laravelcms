@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
    <h1>Meu Perfil</h1>
@endsection

@section('content')

    @if($errors->any())
    @component('components.alert')
        @slot('class')  alert-danger  @endslot
        @slot('ico') icon fas fa-ban @endslot
        @slot('type')   Ocorreu um erro!   @endslot
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>    
        @endforeach
    @endcomponent
    @endif

    @if(session('warning'))
    @component('components.alert')
        @slot('class')  alert-success  @endslot
        @slot('ico') icon fas fa-check @endslot
        @slot('type')   Deu certo!   @endslot
        {{session('warning')}}
    @endcomponent
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.save') }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nova Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Confirmação da Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection