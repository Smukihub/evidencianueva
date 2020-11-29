<?php

namespace App\Observers;

use App\Models\Categoria;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class CategoriaObserver
{
     protected $usuario = null;
    public function __construct()
    {
        $user =Auth::user();
        if(is_null($user))
            $this->usuario = 'Anonimo';
        else
            $this->usuario =$user->nombre;
    }
    /**
     * Handle the categoria "created" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function created(Categoria $categoria)
    {
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'accion' => 'Agrego Categoria',
            'que' => $categoria->toJson()
        ]);
    }

    /**
     * Handle the categoria "updated" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function updated(Categoria $categoria)
    {
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'accion' => 'Actualizo Categoria',
            'que' => $categoria->toJson()
        ]);
    }

    /**
     * Handle the categoria "deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function deleted(Categoria $categoria)
    {
            $registro = Bitacora::create([
            'quien' => $this->usuario,
            'accion' => 'Elimino Categoria',
            'que' => $categoria->toJson()
        ]);
    }

    /**
     * Handle the categoria "restored" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function restored(Categoria $categoria)
    {
        //
    }

    /**
     * Handle the categoria "force deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function forceDeleted(Categoria $categoria)
    {
        //
    }
}
