 @extends('layout.master')
@section('title', 'Editar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  <div class="inside">
    <form action="{{ url('/user') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <center><h3>Crear un nuevo usuario</h3></center>
   <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre">
  </div>
  <div class="form-group">
    <label for="a_paterno">Apellido Paterno</label>
    <input type="text" name="a_paterno" class="form-control" id="a_paterno">
  </div>
  <div class="form-group">
    <label for="a_materno">Apellido Materno</label>
    <input type="text" name="a_materno" class="form-control" id="a_materno">
  </div>
  <div class="form-group">
    <label for="imagen">Foto</label>
    <input type="file" name="imagen" class="form-control" id="imagen">
  </div>

  <div class="form-group">
    <label for="rol">rol</label>
    <select name="rol" id="rol">
      <option>Supervisor</option>
      <option>Encargado</option>
      <option>Contador</option>
      <option>Cliente</option>
    </select>
  </div>

  <div class="form-group">
    <label for="activo">Activo</label>
    <input type="text" name="activo" class="form-control" id="activo">
  </div>

   <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
<div class="form-group">
    <label for="password2">Repita la Contraseña</label>
    <input type="password" name="password2" class="form-control" id="password2">
  </div>
  
  <center><input class="btn btn-success" type="submit" value="Enviar"></center> 
  
</form>
<a href="{{ url('/user') }}"><button class="btn btn-danger">Regresar</button></a>
</div>
   
  
</form>
@endsection