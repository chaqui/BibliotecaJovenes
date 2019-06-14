<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resenia;
use PHPUnit\Runner\Exception;

class ReseniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($libro)
    {
        $resenias = Resenia::select("id","descripcion")->where("Libro_id",$libro)->get();
        if(count($resenias)==0){
            return response("No existe la resenia",404);
        }
        return response()->json($resenias, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $libro)
    {
        $request->validate(
            [
                "comentario"=>"required"
            ]
        );
        $resenia = new Resenia();
        $resenia->descripcion = $request->get("comentario");
        $resenia->Libro_id = $libro;
        $resenia->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $libro)
    {
        try
        {
            $resenia = Resenia::select("id","descripcion")->where([
                ["id","=",$id],
                ["Libro_id","=",$libro],
            ])->first();
            
            if(!$resenia){
                return response("No existe la resenia",404);
            }

        }
        catch(Exception $e){
            return response($e->getMessage(),400);
        }
        return response()->json($resenia, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$libro)
    {
        try
        {
            $resenia = Resenia::select("id","descripcion")->where([
                ["id","=",$id],
                ["Libro_id","=",$libro],
            ])->first();
            
            if(!$resenia){
                return response("No existe la resenia",404);
            }

            $resenia->descripcion = $request["descripcion"];
            $resenia->save();
        }
        catch(Exception $e){
            return response($e->getMessage(),400);
        }
        return response("actualizado correctamente",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $libro)
    {
        try
        {
            $resenia = Resenia::select("id","descripcion")->where([
                ["id","=",$id],
                ["Libro_id","=",$libro],
            ])->first();
            
            if(!$resenia){
                return response("No existe la resenia",404);
            }
            $resenia->delete();
        }
        catch(Exception $e){
            return response($e->getMessage(),400);
        }
        return response("eliminado correctamente",200);
    }

}
