<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alumno;
use App\User;
use GuzzleHttp\Client;
use Barryvdh\DomPDF\Facade as PDF;
define("YEAR", DATE("Y"));
define("HOY", DATE("Y-m-d"));

class alumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::select("*",\DB::raw("concat_ws(' ',ApePaterno,ApeMaterno) as Apellidos"),"Celular")
        ->where("Tipo","1")->orderBy("ApePaterno","ASC")
        ->get();
        return compact("alumnos");
    }

    public function cobradores()
    {
        $alumnos = Alumno::select("*",\DB::raw("concat_ws(' ',ApePaterno,ApeMaterno) as Apellidos"),"Celular")
        ->where("Tipo","2")->orderBy("ApePaterno","ASC")
        ->get();
        return compact("alumnos");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the PDF boleta.
     *
     * @return \Illuminate\Http\Response
     */
   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->cliente);
        $alumno = new Alumno();
        $title              = "";
        $type               = "";
        $text               = "";

        $objPersona              = Alumno::where("DNI",$request->cliente['dni'])->get();
        if (count($objPersona) == 0) 
        {
            $alumno->DNI            = $request->cliente['dni'];
            $alumno->Cobrador       = $request->cliente['cobrador'];
            $alumno->Nombre         = mb_strtoupper($request->cliente['nombre']);
            $alumno->ApePaterno     = mb_strtoupper($request->cliente['pater']);
            $alumno->ApeMaterno     = mb_strtoupper($request->cliente['mater']);
            $alumno->Direccion      = mb_strtoupper($request->cliente['dir']);
            $alumno->Genero         = mb_strtoupper($request->cliente['genero']);
            $alumno->Celular        = $request->cliente['celular'];
            $alumno->Tipo           = 1;
            $alumno->created_at     = HOY;
            $title                  = "OK";
            $type                   = "success";
            $text                   = "Cliente registrado con éxito";
            $alumno->save();
        }else
        {
            $title              = "OK";
            $type               = "success";
            $text               = "Cliente ya se encuentra registrado";
        }
        
        return compact("title","type","text");
    }

    public function storecobrador(Request $request)
    {
        $alumno = new Alumno();
        $user   = new User();
        $title              = "";
        $type               = "";
        $text               = "";

        $objPersona              = Alumno::where("DNI",$request->cliente['dni'])->get();
        if (count($objPersona) == 0) 
        {
            $alumno->DNI            = $request->cliente['dni'];
            $alumno->Nombre         = mb_strtoupper($request->cliente['nombre']);
            $alumno->ApePaterno     = mb_strtoupper($request->cliente['pater']);
            $alumno->ApeMaterno     = mb_strtoupper($request->cliente['mater']);
            $alumno->Direccion      = mb_strtoupper($request->cliente['dir']);
            $alumno->Genero         = mb_strtoupper($request->cliente['genero']);
            $alumno->Celular        = $request->cliente['celular'];
            $alumno->Tipo           = 2;
            $alumno->created_at     = HOY;
            $title                  = "OK";
            $type                   = "success";
            $text                   = "Cobrador registrado con éxito";
            $alumno->save();
        }else
        {
            $title              = "OK";
            $type               = "success";
            $text               = "Cobrador ya se encuentra registrado";
        }
        $objUser                = user::where("user",$request->cliente['dni'])->get();
        if (count($objUser) == 0) 
        {
            $avatar = $request->cliente['genero'] == "M" ? 5 : 3;
            $user->user             = $request->cliente['dni'];
            $user->password         = bcrypt("Inicio01"); 
            $user->avatar           = $avatar; 
            $user->tipo             = 2;
            $user->estado           = 1;
            $user->created_at       = HOY;
            $user->save();
        }else
        {
            user::where("user",$request->cliente['dni'])->update([
                'estado' => 1,
                ]);
        }
        
        return compact("title","type","text");
    }

    public function consultaDNI($dni)
    {
        $client = new Client([ 
            'headers' => [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            // "key"   => "Authorization",
            "Authorization" => "Bearer c03636f43e88e010d600acf335bfb366421b55bddeef39a7f87843c317440ea1"
            ]]);
        
            
                $res = $client->request('GET', "https://apiperu.dev/api/dni/$dni",
                [
                        'body' => json_encode(
                            [
                                
                            ]
                        )
                ]
                );
            $val  = $res->getBody()->getContents();
            $valor  = json_decode($val,true);
            if($valor["success"])
            { 
                $datos      =   $valor["data"];
                $nombres     =   $datos["nombres"]; 
                $paterno    =   $datos["apellido_paterno"];
                $materno    =   $datos["apellido_materno"];
            }else
            {
                $nombres     =   ""; 
                $paterno    =   "";
                $materno    =   "";
            }
            // dd($valor["data"]);    
            return compact("nombres","paterno","materno");
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $year = date("Y");
        $clientes =  Alumno::select("personas.DNI AS code",\DB::RAW("concat_ws(' ',personas.Nombre,personas.ApePaterno,
                    personas.ApeMaterno) as 'label'"))
                    ->where("Tipo","1")->get();
        return compact("clientes");
    }
    public function showv2()
    {
        $us = \Auth::user()->user;
        $year = date("Y");
        $clientes =  Alumno::select("personas.DNI AS code",\DB::RAW("concat_ws(' ',personas.Nombre,personas.ApePaterno,
                    personas.ApeMaterno) as 'label'"))
                    ->where([["Tipo","1"],["Cobrador",$us]])->get();
        return compact("clientes");
    }
    public function showcobradores()
    {
        $year = date("Y");
        $clientes =  Alumno::select("personas.DNI AS code",\DB::RAW("concat_ws(' ',personas.Nombre,personas.ApePaterno,
                    personas.ApeMaterno) as 'label'"))
                    ->where("Tipo","2")->get();
        return compact("clientes");
    }    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function alumno()
    {
        $objUser = \Auth::user();
        $user   = $objUser->user; 
        $alumno = alumno::where("DNI",$user)->first();
        return compact('alumno',"user");
        
    }
    public function upAlumno(Request $request)
    {
        $objUser = \Auth::user();
           
        if(isset($objUser))
        {
            $user    = $objUser->user;
            if(isset($request->cliente['pass']) && $request->cliente['pass'] != '')
            $objUser    = user::where("user",$user)->update(
                [
                    "password"   => bcrypt($request->cliente['pass']),
                    "update_at" => HOY
                ]);
            return "OK";
        }else{
            return view("/");
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $alumno = Alumno::where('DNI',$request->cliente['dni'])->update(
                [
                    'Nombre'        => mb_strtoupper($request->cliente['nombre']),
                    'ApePaterno'    => mb_strtoupper($request->cliente['pater']),
                    'ApeMaterno'    => mb_strtoupper($request->cliente['mater']),
                    'Direccion'     => mb_strtoupper($request->cliente['dir']),
                    'Celular'       => $request->cliente['celular'],
                    'updated_at'    => HOY,
                ]
        );
        return "OK";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar   =   Alumno::where('DNI',$id)->delete();
        if($eliminar){
            return "OK";
        }else{
            return "FAIL";
        }
    
    }
   
}