@extends('layout.master')
@section('title', 'ADMINISTRADOR')
@section('content')
<div class="container card text-center">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                @foreach($productos as $producto)

                <div class="card mtop16" style="width: 25rem;">
                  <img class="card-img-top" src="{{ asset('storage').'/'.$producto->imagen}}" alt="Card image cap" width="700">
                 <div class="card-body">
                <h4 class="card-title">{{ $producto->nombre }}</h4>
                <h5 class="card-title">{{ $producto->categoria->nombre }}</h5>
                <h5 class="card-title">Stock disponible: {{ $producto->cantidad}}</h5>
               <h5 class="card-text">Precion: {{ $producto->precio }}</h5> 
            <p class="card-text">{{ $producto->descripcion }}</p>
            <h5 class="card-text">Estado: {{ $producto->estado }}</h5>
            <a href="#" class="btn btn-primary">ver detalle</a>
            @can('comprar')
          <a href="#" class="btn btn-success">comprar</a>
          @endcan

  </div>
</div>                 
                @endforeach

            </ul>

       
@endsection