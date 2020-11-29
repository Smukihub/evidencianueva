@extends('layout.master')
@section('title', 'Ver')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
    
  <div class="inside">
  <form action="{{ url('/user/'.$usuario->id) }}" method="POST" enctype="multipart/form-data">
     @csrf
      @method('PUT')
    <center><h3>Usuarios Datos</h3></center>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $usuario->nombre }}" disabled>
  </div>
  
  <div class="form-group">
    <label for="a_paterno">Apellido Paterno</label>
    <input type="text" name="a_paterno" class="form-control" id="a_paterno" value="{{ $usuario->a_paterno }}" disabled>
  </div>
  <div class="form-group">
    <label for="a_materno">Apellido Materno</label>
    <input type="text" name="a_materno" class="form-control" id="a_materno" value="{{ $usuario->a_materno }}" disabled>
  </div>
 <div class="form-group">
    <label for="exampleFormControlInput1">Imagen</label>
    <br />
    <img src="{{ asset('storage').'/'.$usuario->imagen}}" alt="" width="100">
    <br />
    
    <br />
  </div>

 <div class="form-group">
    <label for="rol">rol</label>
    <select name="rol" id="rol" disabled>
      @if($usuario->rol =="Supervisor")
      <option selected>Supervisor</option>
      @else
      <option>Supervisor</option>
      @endif
      @if($usuario->rol =="Encargado")
      <option selected>Encargado</option>
      @else
      <option>Encargado</option>
      @endif
      @if($usuario->rol =="Contador")
      <option selected>Contador</option>
      @else
      <option>Contador</option>
      @endif
      @if($usuario->rol =="Cliente")
      <option selected>Cliente</option>
      @else
      <option>Cliente</option
      @endif
      >
    </select>
  </div>

  <div class="form-group">
    <label for="activo">Activo</label>
    <input type="text" name="activo" class="form-control" id="activo" value="{{ $usuario->activo }}" disabled>
  </div>

   <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" name="password" class="form-control" id="password" value="{{ $usuario->password }}" disabled>
  </div>
<div class="form-group">
    <label for="password2">Repita la Contraseña</label>
    <input type="password" name="password2" class="form-control" id="password2" value="{{ $usuario->password2 }}" disabled>
  </div>
  </form>
<center><a href="{{ url('/user/'.$usuario->id.'/edit') }}" role="button" class="btn btn-success" data-toggle="modal">Editar</a></center>


         
  

</form>
 <a href="{{ url('/user') }}"><button class="btn btn-danger">Regresar</button></a>
   
   </div>

@endsection