<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Cronograma</title>
</head>
<style>
    .verticalText {
    writing-mode: vertical-lr;
    transform: rotate(270deg);
    
    }
    .text-left {
    text-align: left !important;
    }

    .text-right {
    text-align: right !important;
    }

    .text-center {
    text-align: center !important;
    }
    .fondo{
        border: solid 1px #000000;
        background-color: #696969;
        color: #ffffff;
    }
    .amarillo{
        background-color: #ffff06;
    }
    .verdeopaco{
        background-color: #7aec66;
    }
    .verde{
        background-color: #00ff00;
    }
    .celeste{
        background-color: #52d9f5;
    }
    table {
    border-collapse: collapse;
    }
    .container 
    {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    .centrartabla{
        margin: auto;
    }
    .text-primary
    {
        color :blue;
    }
    .text-danger
    {
        color :red;
    }
    .text-success
    {
        color :green;
    }
    .zoscuro
    {
        color: #696969;
    }
</style>
<body>
    @php
        $i = 1;
        $monto = 0;
        $hoy = date("Y-m-d");
        
    @endphp
    <center>
        <h2>Reporte General {{$fecha}}</h2>
        <hr class="text-success">
    </center>
    <br>
    <table border="1" style="font-size: 13px" class="text-center centrartabla" cellpadding="0" cellspacing="0">
        <tr>
            <td width=30><b>ID Prestamo</b></td>
            <td width=210><b>Cliente</b></td>
            <td width=60><b>Fecha Prestamo</b></td>
            <td width=60><b>Capital</b></td>
            <td><b>Cuotas Restantes</b></td>
            <td width=60><b>Pago Diario</b></td>
            <td width=60><b>Saldo</b></td>
            
        </tr>
        @foreach ($prestamos as $item)
        <tr>
            <td>{{$item->IDPrestamo}}</td>
            <td>{{$item->Cliente}}</td>
            <td>{{$item->Fecha}}</td>
            <td>{{number_format($item->Prestamo,2,".",",")}}</td>
            <td>{{$item->pagadas}}</td>
            <td>{{number_format($item->Cuota,2,".",",")}}</td>
            <td>{{number_format($item->Saldo,2,".",",")}}</td>
            {{-- <td>{{number_format($item->pago,2,".",",")}}</td> --}}
            @php
                $monto += $item->Saldo;
            @endphp
        </tr>
        @endforeach
        <tr>
            <td align="right" colspan="6"><b> Total </b></td>
            <td align="left"><b>{{number_format($monto,2,".",",")}}</b></td>
        </tr>
    </table>
</body>
</html>