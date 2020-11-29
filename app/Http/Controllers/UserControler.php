<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $usuarios=Usuario::all();
        
       
      


       $usuarios = User::where('id',Auth::id())->get();
      
        //$usuarios = User::where('rol',"=","supervisor")->get();
       // $usuarios = User::where('rol',Auth::id())->get();

        
        return view('supervisor.user.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$usuarios = Usuario::where('id',Auth::id())->get();
     
       return view('supervisor.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosUsuario=request()->except('_token');
         // $usuarios = User::where('id',Auth::id())->get();
        //validamos que el campo imagen tenga algo
      

       if ($datosUsuario['password']!=$datosUsuario['password2'])
            return redirect()->back()->with('error','El password no esta bien confirmado');
         $datosUsuario['password']=Hash::make( $datosUsuario['password'] );
         $datosUsuario['password2']=Hash::make( $datosUsuario['password2'] );

        if ($request->hasFile('imagen')) {
            $datosUsuario['imagen']=$request->file('imagen')->store('uploads/usuario','public');
        }
       User::insert($datosUsuario);
        //return response()->json($datosCategorias);
        //return view('supervisor.categoria.index');
       return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario= User::findOrFail($id);

        return view('supervisor.user.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::where('id',Auth::id())->get();
         $usuario= User::findOrFail($id);

        return view('supervisor.user.edit',compact('usuario','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $usuarios = User::where('id',Auth::id())->get();   
        $datosUsuario=request()->except(['_token','_method']);

 if ($datosUsuario['password']!=$datosUsuario['password2'])
            return redirect()->back()->with('error','El password no esta bien confirmado');
    

        //si el password esta en blanco no lo actualizaremos
        if(is_null($datosUsuario['password']))
            unset($datosUsuario['password']);
        else
            $datosUsuario['password']=Hash::make( $datosUsuario['password'] );
        $datosUsuario['password2']=Hash::make( $datosUsuario['password2'] );
       
       if ($request->hasFile('imagen')) {

            $usuario= User::findOrFail($id);

            Storage::delete('public/'.$usuario->imagen);

            $datosUsuario['imagen']=$request->file('imagen')->store('uploads/usuario','public');
        }

        User::where('id','=',$id)->update($datosUsuario);

        $usuario= User::findOrFail($id);

        return view('supervisor.user.edit',compact('usuario','usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario= User::findOrFail($id);

       if(Storage::delete('public/'.$usuario->imagen)){

          User::destroy($id);  
       }

        return redirect('user');
    }
}
