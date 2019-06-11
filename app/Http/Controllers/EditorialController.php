<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;


class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autor = Editorial::select('id','nombre')->get();
        if(count($autor)==0){
            return response("no hay ningun editorial", 204);
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
        $autorExiste = Editorial::where("nombre","=",$request->get("nombre"))->paginate(1);
        if(count($autorExiste) == 0){
            $editorial = new Editorial();
            $editorial->nombre = $request->get("nombre");
            $editorial->save();
            return response("guardado   correctamente",200);
        }
        else{
            return response("el editorial existe",202);
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
        $editorial = Editorial::findOrFail($id);
        return response()->json($editorial, 200 );
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
        $editorial = Editorial::findOrFail($id);
        $editorial->nombre = $request->get("nombre");
        $editorial->save();
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
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();
        return response("eliminado correctamente",200);
    }

    /**
     * obtener los libros del editorial
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function obtenerLibros($id)
    {
        $editorial = Editorial::findOrFail($id);
        $libros= $editorial->libros;
        if(count($libros)>0){
            return response()->json($libros, 200 );
        }
        return response("no hay libros",202);
       
    }
}
