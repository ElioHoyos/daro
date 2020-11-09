<?php

namespace App\Http\Controllers;

use App\catalogos;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogos = catalogos::all();
        return compact("catalogos");
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
            $catalogo              = new catalogos();
            $catalogo->tipo        = $request->config["tipo"]; 
            $catalogo->detalle     = $request->config["detalle"];
            $catalogo->created_at  = $hoy;
            $catalogo->save();
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
     * @param  \App\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function show(catalogos $catalogos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function edit(catalogos $catalogos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catalogos $catalogos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\catalogos  $catalogos
     * @return \Illuminate\Http\Response
     */
    public function destroy(catalogos $catalogos)
    {
        //
    }
}
