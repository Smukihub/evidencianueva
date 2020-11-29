<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  //  use HasFactory;
	protected $fillable = [
        'nombre', 
        'descripcion', 
        'imagen', 
        'cantidad', 
        'precio', 
        'estado', 
        'activo' , 
        'categoria_id'
    ];

    

    public function categoria(){
    	return $this->belongsTo('App\Models\Categoria');
    }
	public function propetario(){
		return $this->hasOne('App\Models\User','id','usuario_id');
	}
	/*public function estaConcesionado(){
		if ($this->concesionado) 
			return "SI";
		else
			return "NO";
		}

	public function usuario(){
		return $this->belongsTo('App\Models\User');
	}
	*/
	}

