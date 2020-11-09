<?php

namespace App\Http\Controllers;

use App\cobros;
use App\alumno;
use App\ingresos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($desde,$hasta)
    {
        $zdesde = date("d/m/Y", strtotime($desde));
        $zhasta = date("d/m/Y", strtotime($hasta));
        $ingresos = cobros::join("personas AS c","cobros.DNI","c.DNI")
                    ->join("personas AS d","c.Cobrador","d.DNI")
                    ->select(\DB::RAW("concat_ws(' ',d.ApePaterno,d.ApeMaterno,d.Nombre) as Cobrador"),
                        "cobros.ID",\DB::RAW("concat_ws(' ',c.ApePaterno,c.ApeMaterno,c.Nombre) as Cliente"),"cobros.Monto",\DB::raw("DATE_FORMAT(cobros.Fecha,'%d-%m-%Y') AS Fecha"))
                    ->where([["Fecha",">=",$desde],["Fecha","<=",$hasta]])
                    ->get();
        $pdf = PDF::loadView('templates.ingresos', compact ('ingresos','zdesde','zhasta'));
        return $pdf->stream('Reporte.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cobros  $cobros
     * @return \Illuminate\Http\Response
     */
    public function show($desde,$hasta)
    {
        $ingresos = cobros::join("personas AS c","cobros.DNI","c.DNI")
                    ->select("cobros.ID",\DB::RAW("concat_ws(' ',c.ApePaterno,c.ApeMaterno,c.Nombre) as Cliente"),"cobros.Monto",\DB::raw("DATE_FORMAT(cobros.Fecha,'%d-%m-%Y') AS Fecha"))
                    ->where([["Fecha",">=",$desde],["Fecha","<=",$hasta]])
                    ->get();
        $num = count($ingresos);
        $IsConsistent = true;
        if($num == 0) $IsConsistent = false;
        return compact("ingresos","IsConsistent");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cobros  $cobros
     * @return \Illuminate\Http\Response
     */
    public function datos()
    {
        $prestamos = ingresos::where("Estado",0)->get()->count();
        $clientes = alumno::where("Tipo",1)->get()->count();
        return compact("prestamos","clientes");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cobros  $cobros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cobros $cobros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cobros  $cobros
     * @return \Illuminate\Http\Response
     */
    public function destroy(cobros $cobros)
    {
        //
    }
}
