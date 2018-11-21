@extends('admin.layout')

@section('header')
    <h1>
        POSTS
        <small>Crear publicacion</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i>Posts</a></li>
        <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
<div class="row">
<form method="POST" action="{{route('admin.posts.store')}}">
    {{ csrf_field() }}

    <div class="col-md-8">
        <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Titulo de la publicacion</label>
                        <input name="title" class="form-control" placeholder="Ingresa aqui el titulo de la publicacion">
                    </div>
                    <div class="form-group">
                            <label>Contenido de la publicacion</label>
                            <textarea 
                                rows="10"
                                name="body"
                                id="editor" 
                                class="form-control" 
                                placeholder="Ingresa aqui el Contenido de la publicacion">
                            </textarea> 
                        </div>
                </div>
        </div>
    </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Fecha de publicacion:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="published_at" type="text" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Categorias</label>
                        <select name="category" class="form-control">
                            <option value="">Selecciona una categoria</option>
                            @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Etiquetas</label>
                        <select 
                            name="tags[]"
                            class="form-control select2" 
                            multiple="multiple" 
                            data-placeholder="Selecciona una o mas etiquetas"
                            style="width: 100%;"
                        >
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Extracto de la publicacion</label>
                        <textarea 
                            name="excerpt" 
                            class="form-control" 
                            placeholder="Ingresa aqui el Extracto de la publicacion">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endpush

@push('scripts')

    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        //ckeditor para texto enriquesido
        CKEDITOR.replace('editor')
        //select2 para etiquetas
        $('.select2').select2()
    </script>
    
@endpush

    




    

