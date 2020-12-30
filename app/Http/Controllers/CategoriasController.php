<?php

namespace App\Http\Controllers;

use App\categorias;
use App\productos;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categorias::all();
        // return compact("categorias");
        return view("pagina.categorias",compact('categorias'));
    }

    public function getCategorias()
    {
        $categorias = categorias::all();
        return compact("categorias");
    }

    public function productos(Request $request){

        $term = $request->get('term');

        $querys = Productos::where('nombre','LIKE','%'.$term.'%')->get();

        $data = [];

        foreach ($querys as $query){
            $data[] = [
                'label' => $query->nombre
            ];
            return $data;
        }

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
        try {
            $categoria = new categorias();
            $categoria->nombre      = $request->categoria["nombre"];
            $categoria->descripcion = $request->categoria["descripcion"];
            
            $categoria->created_at  = $hoy;
            if(isset($request->categoria['foto']))
            {
                $objFoto        = explode(",",$request->categoria["foto"]);
                $archivo        = base64_decode($objFoto[1]);
                $route          = "/categorias/".$request->categoria["nombre"].".".$request->categoria['ext'];
                $ruta           = public_path().$route;
                file_put_contents($ruta,$archivo);
                $categoria->url         = $route;
            }
            $categoria->save();
            $type = "success";
            $text = "categoria agregada con éxito";
        } catch (\Throwable $th) {
            $type = "error";
            $text = "error: $th";
        }
       
        return compact("text","type");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = productos::where("categoria",$id)->get();
        $categoria = categorias::where("id",$id)->first();
        return view("pagina.categoria")->with(compact("categoria","productos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $hoy = date("Y-m-d");
            $categoria  =   categorias::where("id",$request->categoria["id"])
                                ->update([
                                    "nombre"        => $request->categoria["nombre"], 
                                    "descripcion"     => $request->categoria["descripcion"],
                                ]);
            $type = "success";
            $title = "Ok";
            $text = "categoria actualizada con éxito";
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
     * @param  \App\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categorias::where("id",$id)->delete();
        return "OK";
    }
}
