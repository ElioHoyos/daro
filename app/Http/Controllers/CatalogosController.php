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
        return compact("pagina.inicio");
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

    public function catalogos()
    {
        $catalogos = catalogos::join("categorias AS m","catalogos.Marca","m.id")
                     ->select("catalogos.*","m.nombre AS marcadesc")
                     ->get();
        return compact("catalogos");                      
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
            $catalogo           = new catalogos();
            $catalogo->nombre   = $request->catalogo["nombre"]; 
            $catalogo->Marca    = $request->catalogo["marca"];
            $catalogo->created_at  = $hoy;
            if(isset($request->catalogo['archivo']))
            {
                $objFoto        = explode(",",$request->catalogo["archivo"]);
                $archivo        = base64_decode($objFoto[1]);
                $route          = "/catalogos/".$request->catalogo["nombre"].".".$request->catalogo['ext'];
                $ruta           = public_path().$route;
                file_put_contents($ruta,$archivo);
                $catalogo->url  = $route;
            }
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
    public function destroy($id)
    {
        $catalogo = catalogos::where("id",$id)->delete();
        return "OK";
    }
}
