@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>Configurações</h1>
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
            <form action="{{route('settings.save')}}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Título do Site</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            name="title" 
                            value="{{$settings['title']}}" 
                            class="form-control @error('title') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub-Título do Site</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            name="subtitle" 
                            value="{{$settings['subtitle']}}" 
                            class="form-control @error('subtitle') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail para contato</label>
                    <div class="col-sm-10">
                        <input 
                            type="email" 
                            name="email" 
                            value="{{$settings['email']}}" 
                            class="form-control @error('email') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do fundo</label>
                    <div class="col-sm-10">
                        <input 
                            type="color" 
                            name="bgcolor" 
                            value="{{$settings['bgcolor']}}" 
                            class="form-control @error('bgcolor') is-invalid @enderror" 
                            style="width: 70px">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do text</label>
                    <div class="col-sm-10">
                        <input 
                            type="color" 
                            name="textcolor" 
                            value="{{$settings['textcolor']}}" 
                            class="form-control @error('textcolor') is-invalid @enderror" 
                            style="width: 70px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input 
                            type="submit" 
                            value="Salvar" 
                            class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection