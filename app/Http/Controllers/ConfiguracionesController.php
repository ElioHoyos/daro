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
            if(isset($request->config['foto']))
            {
                $objFoto        = explode(",",$request->config["foto"]);
                $archivo        = base64_decode($objFoto[1]);
                $route          = "/configuraciones/".$request->config["tipo"].".".$request->config['ext'];
                $ruta           = public_path().$route;
                file_put_contents($ruta,$archivo);
                $configuracion->url  = $route;
            }
            $configuracion->save();
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
    public function update(Request $request)
    {
        if(isset($request->config['foto']))
        {
            $objFoto        = explode(",",$request->config["foto"]);
            $archivo        = base64_decode($objFoto[1]);
            $route          = "/configuraciones/".$request->config["tipo"].".".$request->config['ext'];
            $ruta           = public_path().$route;
            file_put_contents($ruta,$archivo);
        }
        if(isset($route))
        {
            try {
                $hoy = date("Y-m-d");
                $configuracion  =   configuraciones::where("id",$request->config["id"])
                                    ->update([
                                        "tipo"          => $request->config["tipo"], 
                                        "detalle"       => $request->config["detalle"],
                                        "url"           => $route,
                                        "updated_at"    => $hoy,
                                    ]);
                $type = "success";
                $title = "Ok";
                $text = "Configuración agregada con éxito";
            } catch (\Throwable $th) {
                $type = "error";
                $title = "Error";
                $text = "$th";
            }
        }else
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
        }
        
        return "OK";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $configuracion  =   configuraciones::where("id",$id)->delete();
            
        return "OK";                   
    }
}
