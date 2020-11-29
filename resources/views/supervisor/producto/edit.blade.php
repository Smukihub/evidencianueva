@extends('layout.master')
@section('title', 'Editar')
@section('content')
<div class="container-fluid">
  <div class="panel shadow">
  
     <form action="{{ url('/producto/'.$producto->id) }}" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
      @method('PUT')
    <center><h3>EDITAR Producto</h3></center>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $producto->nombre }}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput">descripcion</label>
    <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ $producto->descripcion }}">
    
  </div>
   <div class="form-group">
      <label for="email">Categoria</label>
       <select class="form-control" name="categoria_id" id="categoria_id">
        @foreach($cat as $categoria)
         <option value="{{ $categoria->id }}"
          @isset($productos->categoria[0]->nombre)
            @if($categoria->nombre == $categoria->categoria[0]->nombre)
            selected 
            @endif
          @endisset


          >{{ $categoria->nombre }}</option>
         @endforeach
       </select>
 
  <div class="form-group">
    <label for="exampleFormControlInput1">Imagen</label>
    <br />
    <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="300">
    <br />
    <input type="file" name="imagen" class="form-control" id="imagen">
    <br />
    
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="text" name="cantidad" class="form-control" id="cantidad" value="{{ $producto->cantidad }}">
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Precio</label>
    <input type="text" name="precio" class="form-control" id="precio" value="{{ $producto->precio }}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Estado</label>
    <input type="text" name="estado" class="form-control" id="cantidad" value="{{ $producto->estado }}">
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">Activo</label>
    <input type="text" name="activo" class="form-control" id="cantidad" value="{{ $producto->activo }}">
  </div>

 <center><input class="btn btn-success" type="submit" value="Enviar"></center> 
</form>
      <a href="{{ url('/producto') }}"><button class="btn btn-danger">Regresar</button></a>    
       
</div>
   
@endsection