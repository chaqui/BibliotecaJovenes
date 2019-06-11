<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autor = Autor::select('id','nombre')->get();
        if(count($autor)==0){
            return response("no hay ningun autor", 204);
        }
        return response()->json($autor, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required'
        ]);
        $autorExiste = Autor::where("nombre","=",$request->get("nombre"))->paginate(1);
        if(count($autorExiste) == 0){
            $autor = new Autor();
            $autor->nombre = $request->get("nombre");
            $autor->save();
            return response("guardado   correctamente",200);
        }
        else{
            return response("el autor existe",202);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return response()->json($autor, 200 );
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
        $request->validate([
            'nombre'=>'required'
        ]);
        $autor = Autor::findOrFail($id);
        $autor->nombre = $request->get("nombre");
        $autor->save();
        return response("actualizado correctamente",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response("eliminado correctamente",200);
    }
    /**
     * Obtiene todos los libros del autor
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function obtenerLibros($id)
    {
        $autor = Autor::find($id);
        $libros= $autor->libros;
        return response()->json($libros, 200 );
    }
}
