@extends('admin.layout')

@section('header')
    <h1>
        POSTS
        <small>Listado de publicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Posts</li>
    </ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de publicaciones</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Crear Publicacion</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Extracto</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->excerpt }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </td>
                </tr>    
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')

    <!-- Datatables js -->
    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
    <script>
        $(function () {
            $('#posts-table').DataTable()
        })
    </script>

    

@endpush