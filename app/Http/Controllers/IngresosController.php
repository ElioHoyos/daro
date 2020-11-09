<?php

namespace App\Http\Controllers;

use App\ingresos;
use App\alumno;
use App\cobros;
use App\pensiones;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
define("HOY", DATE("Y-m-d"));

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prestamos = Ingresos::join("personas AS c","ingresos.DNI","c.DNI")
                    ->select("ingresos.ID",\DB::RAW("concat_ws(' ',c.ApePaterno,c.ApeMaterno,c.Nombre) as Cliente"),"ingresos.Cuotas","ingresos.Monto",\DB::raw("DATE_FORMAT(ingresos.Fecha,'%d-%m-%Y') AS Fecha"))
                    ->where("Fecha",">=",$request->venta['desde'])
                    ->where("Fecha","<=",$request->venta['hasta'])
                    ->get();
        $num = count($prestamos);
        $IsConsistent = true;
        if($num == 0) $IsConsistent = false;
        return compact("prestamos","IsConsistent");
    }
    public function getPrestamos()
    {
        $prestamos = Ingresos::join("personas AS c","ingresos.DNI","c.DNI")
                     ->join("personas AS d","ingresos.Cobrador","d.DNI")
                     ->select("ingresos.ID",\DB::RAW("concat_ws(' ',c.ApePaterno,c.ApeMaterno,c.Nombre) as Cliente"),\DB::RAW("concat_ws(' ',d.ApePaterno,d.ApeMaterno,d.Nombre) as Cobrador"),"ingresos.Cuotas","ingresos.Monto",\DB::raw("DATE_FORMAT(ingresos.Fecha,'%d-%m-%Y') AS Fecha"))
                     ->get();
        return compact("prestamos");            
    }

    public function getPrestamosv2()
    {
        $user = \Auth::user()->user;
        $prestamos = Ingresos::join("personas AS c","ingresos.DNI","c.DNI")
                     ->join("personas AS d","ingresos.Cobrador","d.DNI")
                     ->select("ingresos.ID",\DB::RAW("concat_ws(' ',c.ApePaterno,c.ApeMaterno,c.Nombre) as Cliente"),\DB::RAW("concat_ws(' ',d.ApePaterno,d.ApeMaterno,d.Nombre) as Cobrador"),"ingresos.Cuotas","ingresos.Monto",\DB::raw("DATE_FORMAT(ingresos.Fecha,'%d-%m-%Y') AS Fecha"))
                     ->where("ingresos.Cobrador",$user)
                     ->get();
        return compact("prestamos");            
    }

    public function verificar()
    {
        $hoy = date("Y-m-d");
        $ingreso = Ingresos::where("updated_at",$hoy)->first();
        if(!isset($ingreso))
        {
            $update = Ingresos::where("updated_at","!=",$hoy)->update(
                [
                    "Pago" => 0,
                ]);
        }
        return "OK";
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
        $IsConsistent = true;

        if($desde > $hasta) $IsConsistent = false;

        $ingresos = Ingresos::join("alumno AS a","ingresos.DNIAlumno","a.DNI")
                    ->select("ingresos.ID AS IDComprobante",\DB::RAW("concat_ws(' ',a.ApePaterno,a.ApeMaterno,a.Nombre) as Alumno"),"ingresos.Comprobante","ingresos.Concepto","ingresos.Monto",\DB::RAW("date_format(ingresos.Fecha,'%d-%b') AS Fecha"))
                    ->where([["Fecha",">=",$desde],["Fecha","<=",$hasta]])
                    ->orderBy("ingresos.Fecha","ASC")
                    ->get();
        $pdf = PDF::loadView('templates.ventas', compact ('ingresos','zdesde','zhasta','IsConsistent'));
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
        $n = 1;
        
        $venta  = new Ingresos();
        $hoy    = date("Y-m-d");

        $venta->DNI     = $request->prestamo["cliente"];
        $venta->Cobrador     = $request->prestamo["cobrador"];
        $venta->Tipo    = $request->prestamo["tipo"];
        $venta->Cuotas  = $request->prestamo["cuotas"];
        $venta->Monto   = $request->prestamo["monto"];
        $venta->Saldo   = $request->prestamo["monto"]*(1+$request->prestamo["porcentaje"]/100);
        $venta->Porcentaje  = $request->prestamo["porcentaje"];
        $venta->Cuota   = $request->prestamo["cuota"];
        $venta->Fecha   = $request->prestamo["fecha"];
        $venta->created_at   = $hoy;
        $venta->save();
        $type = "";
        if($request->prestamo["tipo"] == "DIARIO") $type = "days";
        else if($request->prestamo["tipo"] == "SEMANAL") $type = "week";
        else if($request->prestamo["tipo"] == "MENSUAL") $type = "month";

        $fecha = $request->prestamo["fecha"];
        
        $objVenta   = Ingresos::orderBy("ID","DESC")->first();
        $IDPrestamo = $objVenta->ID;
        $y = 0;

        while($n <= $request->prestamo["cuotas"])
        {
            $y++;
            $newDate = date("Y-m-d",strtotime($fecha."+ $y $type"));
            $domingo = date("w",strtotime($newDate));
            if($domingo == 0)
            {
                $y++;
                $newDate1 = date("Y-m-d",strtotime($fecha."+ $y $type"));
            }else
            {
                $newDate1 = $newDate;
            }

            $pensiones              = new Pensiones();
            $pensiones->IDPrestamo  = $IDPrestamo;
            $pensiones->DNI         = $request->prestamo["cliente"];
            $pensiones->Cobrador    = $request->prestamo["cobrador"];
            $pensiones->Tipo        = $request->prestamo["tipo"];
            $pensiones->nroCuota    = $n;
            $pensiones->Porcentaje  = $request->prestamo["porcentaje"];
            $pensiones->Fecha       = $newDate1;
            $pensiones->Cuota       = $request->prestamo["cuota"];
            $pensiones->Estado      = 0;
            $pensiones->created_at  = $hoy;
            $pensiones->save();
            $n++;
        }
        
        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuotas = pensiones::where("IDPrestamo",$id)->get();
        return compact("cuotas");
    }

    public function pagar($id,$monto,$pago)
    {
        $val = $monto - $pago;
        $hoy = date("Y-m-d");
        $objPension = pensiones::where("ID",$id)->first();
        $fecha      = $objPension->Fecha;
        $IDPrestamo = $objPension->IDPrestamo;
        $DNI        = $objPension->DNI;
        $Monto      = $objPension->Cuota;
        $nroCuota   = $objPension->nroCuota;
        $objPrestamo  = Ingresos::where("ID",$IDPrestamo)->first();
        $Saldo      = $objPrestamo->Saldo;
        $zprestamo = Ingresos::where("ID",$IDPrestamo)->update(
            [
                "Saldo" => $Saldo-$pago,
                "Pago"  => $pago,
                "updated_at" => $hoy,
            ]); 
        if($fecha < $hoy)
        {
            if($val == 0)
            {
                $estado = 2;
            }else
            {
                $estado = 3;
            }
        }else
        {
            if($val == 0)
            {
                $estado = 1;
            }else
            {
                $estado = 3;
            }
        }
        try {
            $cuotas = pensiones::where("ID",$id)->update(
                [
                    "Estado" => $estado,
                    "Cuota" => $val,
                    "update_at" => $hoy,
                ]);
            $objCronograma = pensiones::where([["IDPrestamo",$IDPrestamo],["Estado",0]])->get()->count();
            if($objCronograma == 0)
            {
                $prestamo = Ingresos::where("ID",$IDPrestamo)->update(
                    [
                        "Estado" => 1,
                    ]);
            }
            $cobro = new cobros();
            $cobro->IDPrestamo = $IDPrestamo;         
            $cobro->DNI = $DNI;         
            $cobro->nroCuota = $nroCuota;         
            $cobro->Monto = $pago;         
            $cobro->Fecha = $fecha;         
            $cobro->save();
                    
            $type = "success";    
            $text = "Cuota Paga con éxito";    
        } catch (\Throwable $th) {
            $type = "error";    
            $text = "$th";   
        }
        return compact("type","text");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function reporte($id)
    {
        $objPrestamo =  pensiones::join("ingresos AS s","cronograma.IDPrestamo","s.ID")
                        ->join("personas AS c","s.DNI","c.DNI")
                        ->join("personas AS d","s.Cobrador","d.DNI")
                        ->select(\DB::RAW("concat_ws(' ',c.Nombre,c.ApePaterno,c.ApeMaterno) as Cliente")
                        ,\DB::RAW("concat_ws(' ',d.Nombre,d.ApePaterno,d.ApeMaterno) as Cobrador"))
                        ->where("s.ID",$id)->first();
        if(isset($objPrestamo))
        {
            $cliente = $objPrestamo->Cliente; 
            $cobrador = $objPrestamo->Cobrador; 
        }
                                        

        $cuotas  = pensiones::where("IDPrestamo",$id)->get();
        
        $pdf = PDF::loadView('templates.ventas', compact ('cuotas','cliente','cobrador'));
        $pdf->setPaper("A4","protrait");
        return $pdf->stream('Cronograma.pdf');
    }

    public function reportegeneral($cobrador,$fecha)
    {
        $hoy = date("Y-m-d");
        $prestamos =    pensiones::join("ingresos AS s","cronograma.IDPrestamo","s.ID")
                        ->join("personas AS c","s.DNI","c.DNI")
                        ->select("cronograma.IDPrestamo",\DB::raw("date_format(s.Fecha,'%d-%b') AS Fecha"),
                        \DB::RAW("concat_ws(' ',c.Nombre,c.ApePaterno,c.ApeMaterno) as Cliente")
                        ,"s.Monto","s.Saldo  AS Saldo","s.Cuota",
                        \DB::RAW("s.Cuota*s.Cuotas AS Prestamo"),
                        // \DB::raw("s.Pago AS pago"),
                        \DB::RAW("count(cronograma.IDPrestamo) AS pagadas"))  
                        ->where([["cronograma.Estado",0],["s.Cobrador",$cobrador]])
                        ->groupBy("cronograma.IDPrestamo")->get();

        $pdf = PDF::loadView('templates.reporte', compact ('prestamos','fecha'));
        $pdf->setPaper("A4","landscape");
        return $pdf->stream('prestamos.pdf');
    }

    public function reporteprestamos()
    {
        $hoy = date("Y-m-d");
        $prestamos =    ingresos::join("personas as p","ingresos.DNI","p.DNI")
                        ->join("personas as j","ingresos.Cobrador","j.DNI")
                        ->select()->get();

        $pdf = PDF::loadView('templates.reporte', compact ('prestamos'));
        $pdf->setPaper("A4","protrait");
        return $pdf->stream('prestamos.pdf');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function cobros($fecha,$vendedor)
    {
        $cobros =   pensiones::join("personas AS c","cronograma.DNI","c.DNI")
                    ->select("IDPrestamo AS ID",\DB::RAW("concat_ws(' ',c.Nombre,c.ApePaterno,c.ApeMaterno) as Cliente"),"Cuota AS Monto",\DB::RAW("date_format(Fecha,'%d-%b') AS Fecha"),"nroCuota AS Cuota")
                    ->where([["Fecha",$fecha],["c.Cobrador",$vendedor]])->get();
        $IsConsistent = count($cobros) == 0 ? false : true;                    
        return compact("cobros","IsConsistent");
    }

    public function cobrospdf($fecha,$vendedor)
    {
        $cobrador = alumno::where("DNI",$vendedor)->select(\DB::RAW("concat_ws(' ',Nombre,ApePaterno,ApeMaterno) as Cobrador"))->first()->Cobrador;
        $cobros =   pensiones::join("personas AS c","cronograma.DNI","c.DNI")
                    ->select("cronograma.Estado","c.Celular","IDPrestamo AS ID",\DB::RAW("concat_ws(' ',c.Nombre,c.ApePaterno,c.ApeMaterno) as Cliente"),"Cuota AS Monto",\DB::RAW("date_format(Fecha,'%d-%b') AS Fecha"),"nroCuota AS Cuota")
                    ->where([["Fecha",$fecha],["cronograma.Cobrador",$vendedor]])->get();
        $IsConsistent = count($cobros) == 0 ? false : true;          

        $pdf = PDF::loadView('templates.cobros', compact ('cobros','cobrador'));
        $pdf->setPaper("A4","portrait");

        return $pdf->stream('Cronograma.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pension = pensiones::where("IDPrestamo",$id)->delete();
            $prestamo = Ingresos::where("ID",$id)->delete();
            
            $type = "success";
            $text = "prestamo eliminado correctamente";
        
        } catch (\Throwable $th) {
            $type = "error";
            $text = "error: $th";
        }
        return compact("type","text");        
    }
}
