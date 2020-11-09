<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Reporte</title>
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
    @endphp
    <center>
        <h2 class="text-success">Reporte de ingresos</h2>
        <h4 class="text-primary">desde: {{$zdesde}} hasta: {{$zhasta}}</h4>
    </center>
    <hr>
    <table border="1" style="font-size: 13px" class="text-center centrartabla" cellpadding="0" cellspacing="0">
        <tr class="fondo">
            <td width=30><b>ID</b></td>
            <td width=180><b>Cobrador</b></td>
            <td width=180><b>Cliente</b></td>
            <td width=60><b>Fecha</b></td>
            <td width=60><b>Monto</b></td>
        </tr>
        @foreach ($ingresos as $item)
        <tr>
            <td>{{$item->ID}}</td>
            <td>{{$item->Cobrador}}</td>
            <td>{{$item->Cliente}}</td>
            <td>{{$item->Fecha}}</td>
            <td>{{$item->Monto}}</td>
        </tr>
        @php
            $monto += $item->Monto;
        @endphp
        @endforeach
        <tr>
            <td class="text-right" colspan="4"><b>Total</b>&nbsp;</td>
            <td class="text-left"><b>&nbsp;S/ {{number_format($monto,2,".",",")}}</b></td>
        </tr>
    </table>
</body>
</html>