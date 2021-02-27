@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')
    <h1>Editar Página</h1>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pages.update', ['page'=>$page->id]) }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$page->title}}" class="form-control @error('title') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" class="form-control bodyfield">{{$page->body}}</textarea>
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

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'textarea.bodyfield',
            height:300,
            menubar:false,
            plugins:['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css:[
                '{{asset('assets/css/content.css')}}'
            ],
            images_upload_url:'{{ route('image.uploade') }}',
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>

@endsection