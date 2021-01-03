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
        $productos = productos::all();
  
        return view("pagina.producto",compact('productos'));
    }

    public function datos()
    {
        $productos =    productos::join("categorias AS c","productos.categoria","c.id")
                        ->join("categorias AS m","productos.Marca","m.id")
                        ->select("productos.*","c.nombre AS categoriadesc","m.nombre AS marcadesc")
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
        $producto->Marca        = $request->producto["marca"];
        if(isset($request->producto['foto']))
        {
            $objFoto        = explode(",",$request->producto["foto"]);
            $archivo        = base64_decode($objFoto[1]);
            $route          = "/productos/".$request->producto["nombre"].".".$request->producto['ext'];
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
        $productos = productos::where("id",$id)->first();
        return view("pagina.producto")->with("productos",$productos);
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
    public function update(Request $request)
    {
        if(isset($request->producto['foto']))
        {
            $objFoto        = explode(",",$request->producto["foto"]);
            $archivo        = base64_decode($objFoto[1]);
            $route          = "/productos/".$request->producto["nombre"].".".$request->producto['ext'];
            $ruta           = public_path().$route;
            file_put_contents($ruta,$archivo);
        }
        if(isset($route))
        {
            try {
                $hoy = date("Y-m-d");
                $producto  =   productos::where("id",$request->producto["id"])
                                    ->update([
                                        "codigo"        => $request->producto["codigo"],
                                        "nombre"        => $request->producto["nombre"],
                                        "descripcion"   => $request->producto["descripcion"],
                                        "longitud1"     => $request->producto["longitud1"],
                                        "longitud2"     => $request->producto["longitud2"],
                                        "altura"        => $request->producto["altura"],
                                        "tipoSierra"    => $request->producto["tiposierra"],
                                        "Peso"          => $request->producto["peso"],
                                        "PesoOz"        => $request->producto["pesooz"],
                                        "categoria"     => $request->producto["categoria"],
                                        "etiquetas"     => $request->producto["etiquetas"],
                                        "Marca"         => $request->producto["marca"],
                                        "url"           => $route,
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
                $producto  =   productos::where("id",$request->producto["id"])
                                    ->update([
                                        "codigo"        => $request->producto["codigo"],
                                        "nombre"        => $request->producto["nombre"],
                                        "descripcion"   => $request->producto["descripcion"],
                                        "longitud1"     => $request->producto["longitud1"],
                                        "longitud2"     => $request->producto["longitud2"],
                                        "altura"        => $request->producto["altura"],
                                        "tipoSierra"    => $request->producto["tiposierra"],
                                        "Peso"          => $request->producto["peso"],
                                        "PesoOz"        => $request->producto["pesooz"],
                                        "categoria"     => $request->producto["categoria"],
                                        "etiquetas"     => $request->producto["etiquetas"],
                                        "Marca"         => $request->producto["marca"],
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
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = productos::where("id",$id)->delete();
        return "OK";
    }
}
