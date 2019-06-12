<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use Dotenv\Validator;
use Mockery\Exception;
use App\Resenia;

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
        try
        {
        //obtener la data y convertirla en Json
        $data =json_decode($request->getContent(),true);
        $elementos =    $data[0];

        //almacenar la data 
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
    catch(Exception $e){
        return response($e->getMessage(), 400);
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
        try
        {       
            $libro = Libro::where('id',$id)->first();
            if(!$libro){
                return response("no existe",404);
            }
            else
            {
                return response()->json($libro,200);
            }
        }
        catch(Exception $e){
            return response($e->getMessage(), 400);
        }

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
        try
        {       
            //obtener la data
            $data =json_decode($request->getContent(),true);
            $elementos =    $data[0];


            //actualizar el libro
            $libro = Libro::findOrFail($id);
            $libro->nombre = $elementos["nombre"];
            $libro->descripcion = $elementos["descripcion"];
            $libro->cantidad =$elementos["cantidad"];
            $libro->anio = $elementos["anio"];
            $libro->estado = $elementos["estado"];
            $libro->editorial_id =$elementos["editorial_id"];
            $libro->save();
            foreach ($elementos["autores"] as $autor) {
                $autor =$libro->autores->where("id",$autor["id"])->first();
                if(!$autor)
                {
                    $libro->autores()->attach($autor["id"]);
                }
            }
            return response("actualizacion correcta", 200);
        }
        catch(Exception $e){
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        Resenia::where("idLibro",$id)->delete();
        Imagen::where("idLibro",$id)->delete();
        Libro::findOrFail($id)->delete();
        return response("eliminacion correcta",200);
        }
        catch(Exception $e){
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Selecciona los autores del libro
     *
     * @param int $id
     * @return \Illuminate\Http\Response json
     */
    public function obtenerAutores($id){
        try{
            $libro = Libro::findOrFail(2);
            $autores = $libro->autores;
            return response()->json($autores, 200);
        }
        catch (Exception $e){
            return response($e->getMessage(), 400);
        }
       
    }

    /**
     * Selecciona el editorial del libro
     *
     * @param int $id
     * @return \Illuminate\Http\Response json
     */
    public function editorial($id){
        try{
            $libro = Libro::findOrFail(2);
            $editorial =  $libro->editorial;
            return response()->json($editorial, 200);
        }
        catch (Exception $e){
            return response($e->getMessage(), 400);
        }

    }

  
    
}
