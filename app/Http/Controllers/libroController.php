<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
class libroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::select("nombre","descripcion","cantidad","anio","estado")->get();
        if(count($libros)==0){
            return response("no hay ningun Libro", 204);
        }
        return response()->json($libros, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =json_decode($request->getContent(),true);
        $elementos =    $data[0];
        $libro = new Libro();
        $libro->nombre = $elementos["nombre"];
        $libro->descripcion = $elementos["descripcion"];
        $libro->cantidad =$elementos["cantidad"];
        $libro->anio = $elementos["anio"];
        $libro->estado = $elementos["estado"];
        $libro->editorial_id =$elementos["editorial_id"];
        $libro->save();
        foreach ($elementos["autores"] as $autor) {
            $libro->autores()->attach($autor["id"]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
