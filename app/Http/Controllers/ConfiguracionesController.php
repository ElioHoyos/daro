<?php

namespace App\Http\Controllers;

use App\configuraciones;
use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuraciones = configuraciones::all();
        return compact("configuraciones");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $hoy = date("Y-m-d");
            $configuracion              = new configuraciones();
            $configuracion->tipo        = $request->config["tipo"]; 
            $configuracion->detalle     = $request->config["detalle"];
            $configuracion->created_at  = $hoy;
            $configuracion->save();
            $type = "success";
            $title = "Ok";
            $text = "Configuración agregada con éxito";
        } catch (\Throwable $th) {
            $type = "danger";
            $title = "Error";
            $text = "$th";
        }
        return compact("type","title","text");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function show(configuraciones $configuraciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function edit(configuraciones $configuraciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, configuraciones $configuraciones)
    {
        try {
            $hoy = date("Y-m-d");
            $configuracion  =   configuraciones::where("id",$request->config["id"])
                                ->update([
                                    "tipo"        => $request->config["tipo"], 
                                    "detalle"     => $request->config["detalle"],
                                    "updated_at"  => $hoy,
                                ]);
            $type = "success";
            $title = "Ok";
            $text = "Configuración agregada con éxito";
        } catch (\Throwable $th) {
            $type = "error";
            $title = "Error";
            $text = "$th";
        }
        return compact("type","title","text");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $configuracion  =   configuraciones::where("id",$id)
                                ->delete();
            $type = "success";
            $title = "Ok";
            $text = "Configuración agregada con éxito";
        } catch (\Throwable $th) {
            $type = "error";
            $title = "Error";
            $text = "$th";
        }
        return compact("type","title","text");                   
    }
}
