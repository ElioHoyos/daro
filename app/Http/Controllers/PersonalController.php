<?php

namespace App\Http\Controllers;

use App\personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personales = personal::all();
        return compact("personales");
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
            $personal              = new personal();
            $personal->nombre        = $request->personal["nombre"]; 
            $personal->descripcion     = $request->personal["descripcion"];
            $personal->created_at  = $hoy;
            if(isset($request->personal['foto']))
            {
                $objFoto        = explode(",",$request->personal["foto"]);
                $archivo        = base64_decode($objFoto[1]);
                $route          = "/personal/".$request->personal["nombre"].".".$request->personal['ext'];
                $ruta           = public_path().$route;
                file_put_contents($ruta,$archivo);
                $personal->url  = $route;
            }
            $personal->save();
            $type = "success";
            $title = "Ok";
            $text = "Personal agregada con éxito";
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
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $hoy = date("Y-m-d");
            $personal  =   personal::where("id",$request->personal["id"])
                                ->update([
                                    "nombre"        => $request->personal["nombre"], 
                                    "descripcion"     => $request->personal["descripcion"],
                                ]);
            $type = "success";
            $title = "Ok";
            $text = "personal actualizado con éxito";
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
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal = personal::where("id",$id)->delete();
        return "ok";
    }
}
