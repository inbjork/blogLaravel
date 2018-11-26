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
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
    {{ csrf_field() }} {{method_field('PUT')}}
    <div class="col-md-8">
        <div class="box box-primary">
            
            <div class="box-body">
                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                    <label>Titulo de la publicacion</label>
                    <input 
                        name="title" 
                        class="form-control"
                        value="{{ old('title', $post->title) }}" 
                        placeholder="Ingresa aqui el titulo de la publicacion"
                    >
                    {!!$errors->first('title', '<span class="help-block">:message</span>')!!}
                    
                </div>
                <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                    <label>Contenido de la publicacion</label>
                    <textarea 
                        rows="10"
                        name="body" 
                        id="editor"
                        class="form-control" 
                        placeholder="Ingresa aqui el Contenido de la publicacion"
                    >
                    {{old('body', $post->body)}}
                    </textarea>
                    {!!$errors->first('body', '<span class="help-block">:message</span>')!!}
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
                            <input 
                                name="published_at" 
                                type="text"
                                value="{{old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)}}"
                                class="form-control pull-right" 
                                id="datepicker"
                            >
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('category') ? 'has-error' : ''}}">
                        <label>Categorias</label>
                        <select name="category" class="form-control">
                            <option value="">Selecciona una categoria</option>
                            @foreach ($categories as $category)
                                <option 
                                    value="{{ $category->id }}"
                                    {{old('category', $post->category_id) == $category->id ? 'selected' : ''}}
                                >
                                {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        {!!$errors->first('category', '<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <label>Etiquetas</label>
                        <select name="tags[]" class="form-control select2"
                            multiple="multiple"
                            data-placeholder="Selecciona unas o mas etiquetas" 
                            style="width: 100%;">

                            @foreach ($tags as $tag)
                                <option 
                                    {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}} 
                                    value="{{$tag->id}}"
                                >
                                    {{$tag->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                        <label>Extracto de la publicacion</label>
                        <textarea 
                            name="excerpt" 
                            class="form-control" 
                            placeholder="Ingresa aqui el Extracto de la publicacion">
                            {{ old('excerpt', $post->excerpt) }}
                        </textarea>
                        {!!$errors->first('excerpt', '<span class="help-block">:message</span>')!!}
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
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endpush

@push('scripts')

    <!-- Select2 -->
    <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- CK Editor -->
    <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Date Picker -->
    <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
        //CK Editor
        CKEDITOR.replace('editor')
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
    </script>

@endpush