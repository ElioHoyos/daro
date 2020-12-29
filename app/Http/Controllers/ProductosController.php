<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pagina.producto");
    }

    public function datos()
    {
        $productos =    productos::join("categorias AS c","productos.categoria","c.id")
                        ->select("productos.*","c.nombre AS categoriadesc")
                        ->get();
        return compact("productos");                    
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
        $hoy = date("Y-m-d");
        $producto = new productos();
        $producto->codigo       = $request->producto["codigo"];
        $producto->nombre       = $request->producto["nombre"];
        $producto->descripcion  = $request->producto["descripcion"];
        $producto->longitud1    = $request->producto["longitud1"];
        $producto->longitud2    = $request->producto["longitud2"];
        $producto->altura       = $request->producto["altura"];
        $producto->tipoSierra   = $request->producto["tiposierra"];
        $producto->Peso         = $request->producto["peso"];
        $producto->PesoOz       = $request->producto["pesooz"];
        if(isset($request->producto['foto']))
        {
            $objFoto        = explode(",",$request->producto["foto"]);
            $archivo        = base64_decode($objFoto[1]);
            $route          = "/categorias/".$request->producto["nombre"].".".$request->producto['ext'];
            $ruta           = public_path().$route;
            file_put_contents($ruta,$archivo);
            $producto->url  = $route;
        }
        $producto->categoria    = $request->producto["categoria"];
        $producto->etiquetas    = $request->producto["etiquetas"];
        $producto->created_at   = $hoy;
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $producto = productos::where("id",$id)->first();
        // return view("pagina.producto")->with("producto",$producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos $productos)
    {
        //
    }
}
