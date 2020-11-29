<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
	public function getCat(){

    $datos['categorias']=Categoria::paginate(10);

      return view('welcome',$datos);
	}

	public function getProd(){

    $datos['productos']=Producto::paginate(10);
      return view('ListProduct',$datos);
	}

	public function getsearch($nombre){
	
		$categoria=Categoria::where('nombre', $nombre)->first();

		$datos['productos'] =Producto::where('categoria_id');
		return view('ListProduct', $datos);
	}
}
