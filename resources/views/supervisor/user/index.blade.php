@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="panel shadow">
  <div class="inside">
    <table class="table">
  <thead> 
 <td colspan="9"><center><label>Lista de Usuarios</div></label></center></td>
    <tr>
      
      <th scope="col">id</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Foto</th>
      <th scope="col" colspan="3">Acciones</th>
    </tr>

  </thead>
  <tbody class="body1">
   @forelse ($usuarios as $usuario)
   <tr>
     <th scope="row">{{ $usuario->id }}</th>
      
     <td >{{ $usuario->nombre}} {{ $usuario->a_paterno}} {{ $usuario->a_materno}}</td>

    <td>{{ $usuario->rol }}</td>
      <td >
      <img src="{{ asset('storage').'/'.$usuario->imagen}}" alt="" width="150">
       </td>
     <td>
      <a href="{{ url('/user/'.$usuario->id.'/edit') }}" role="button" class="btn btn-success" data-toggle="modal">Editar</a>
    </td>

        <td><a href="{{ url('/user/'.$usuario->id.'/show') }}" role="button" class="btn btn-warning" data-toggle="modal">Mostrar</a>

        </td>
         <td>
           <form method="post" action="{{ url('/user/'.$usuario->id) }}">
            @csrf
             {{ method_field('DELETE') }}
             <button type="submit" class="btn btn-large btn-danger" onclick="return confirm('desea Eliminar este elemento?'); ">Eliminar</button>
           </form>
         </td>
    
   </tr>
   @empty
   <tr>
     <td colspan="5">Sin Usuario Registrado</td>
   </tr>
      @endforelse
  </tbody>

</table>
<div class="boton">
<center><a href="{{ url('/user/create') }}" role="button" class="btn btn-large btn-info" data-toggle="modal">crear</a></center>
</div>
</div>
  </div>

    
@endsection