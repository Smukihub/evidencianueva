@extends('layout.plantilla')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="container card text-center">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                @foreach($categorias as $categoria)

                <div class="card mtop16" style="width: 35rem;">
                  <img class="card-img-top" src="{{ asset('storage').'/'.$categoria->imagen}}" alt="Card image cap" width="700">
                 <div class="card-body">
                <h5 class="card-title">{{ $categoria->nombre }}</h5>
    <p class="card-text">{{ $categoria->descripcion }}</p>
     
    <a href="#" class="btn btn-primary">Ver lista de Producto</a>
   
  </div>
</div>                 
                @endforeach

            </ul>

       
@endsection