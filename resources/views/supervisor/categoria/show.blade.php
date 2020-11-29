@extends('layout.master')
@section('title', 'Mostrar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  
     <form action="{{ url('/categoria/'.$categoria->id) }}" method="POST" enctype="multipart/form-data">
      @csrf

      @method('PUT')
    <center><h3>VER</h3></center>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $categoria->nombre }}" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">descripcion</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ $categoria->descripcion }}" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Imagen Actual</label>
    <br />
    <img src="{{ asset('storage').'/'.$categoria->imagen}}" alt="" width="300">
    <br />
   
    <br />
    
  </div>
  
  <CENTER><a href="{{ url('/categoria/'.$categoria->id.'/edit') }}" role="button" class="btn btn-success" data-toggle="modal">Editar</a></CENTER>
 
</form>
      <a href="{{ url('/categoria') }}"><button class="btn btn-danger">Regresar</button></a>  
       
</div>
   
@endsection