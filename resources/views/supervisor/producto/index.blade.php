@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')

  
<div class="panel shadow">
  
  <form class="navbar-form navbar-left pull-right">

    <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="nombre del producto" aria-label="Search" autocomplete="on">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>

 
  <div class="inside">

    <table class="table">
  <thead> 
 <td colspan="12"><center><label>Lista de Productos</div></label></center></td>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">categoria</th>
      <th scope="col">Descripcion</th>
      <th scope="col">imagen</th>
      <th scope="col">cantidad</th>
      <th scope="col">precio</th>
      <th scope="col">estado</th>
      <th scope="col">activo</th>
      <th colspan="3"><CENTER>ACCION</CENTE></th>
    </tr>

  </thead>
  <tbody class="body1">
    @forelse($productos as $producto)
    <tr>
      <th scope="row">{{ $producto->id }}</th>
    <td scope="row">{{ $producto->nombre}}</td>
    <td >{{ $producto->categoria->nombre }}</td>
    <td scope="row">{{ $producto->descripcion}}</td>
    <td >
      <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="" width="200">
    </td>
    <td >{{ $producto->cantidad}}</td>
    <td >{{ $producto->precio}}</td>
    <td >{{ $producto->estado}}</td>
    <td >{{ $producto->activo}}</td>

     <td>
      <a href="{{ url('/producto/'.$producto->id.'/edit') }}" role="button" class="btn btn-success" data-toggle="modal">Editar</a>
    </td>

        <td><a href="{{ url('/producto/'.$producto->id.'/show') }}" role="button" class="btn btn-warning" data-toggle="modal">Mostrar</a>

        </td>
         <td>
         
           <form method="post" action="{{ url('/producto/'.$producto->id) }}">
            {{csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
           </form>
           
         </td>
    </tr>

    @empty
   <tr>
     <td colspan="10">Sin Productos Registrado</td>
   </tr>
      @endforelse
  </tbody>
  

</table>
<div class="boton">
@can('create', App\Models\Producto::class)
<center><a href="{{ url('/producto/create') }}" role="button" class="btn btn-large btn-info" data-toggle="modal">crear</a></center>
@endcan
</div>
</div>
  </div>

    
@endsection