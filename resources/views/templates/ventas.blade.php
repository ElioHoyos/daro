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
    @endphp
    <center>
        <h2>Cronograma de Pagos</h2>
        <hr>
        <b class="text-primary">Cliente: {{$cliente}}</b> <br>
        <b class="text-success">Cobrador: {{$cobrador}}</b>
    </center>
    
    <br>
    <table border="1" style="font-size: 13px" class="text-center centrartabla" cellpadding="0" cellspacing="0">
        <tr class="fondo">
            <td width=30><b>Nro</b></td>
            <td width=60><b>Fecha</b></td>
            <td width=60><b>Estado</b></td>
            <td><b>Cuota</b></td>
        </tr>
        @foreach ($cuotas as $item)
        <tr>
            <td>{{$item->nroCuota}}</td>
            <td>{{$item->Fecha}}</td>
            @if ($item->Estado == 0)
                <td><b class="text-primary">{{"Pendiente"}}</b></td>
            @else 
                @if ($item->Estado == 1)
                    <td><b class="text-success">{{"Pagado"}}</b></td>
                @else
                    <td><b class="text-danger">{{"Pagado con retraso"}}</b></td>
                @endif
            @endif
            <td>{{$item->Cuota}}</td>
        </tr>
        @php
            $monto += $item->Cuota;
        @endphp
        @endforeach
        <tr>
            <td class="text-right" colspan="3"><b>Total</b>&nbsp;</td>
            <td class="text-left"><b>&nbsp;S/ {{number_format($monto,2,".",",")}}</b></td>
        </tr>
    </table>
</body>
</html>