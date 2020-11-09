@extends('layouts.master')

@section('content')
<h2 class="text-white bg-primary text-center">Tareas curso: {{ ucwords(mb_strtolower($curso))}}</h2>
    @php
        $hoy   = strtotime(Date("Y-m-d"));
        $IsFor = false;
        $n = 0;
        $m = 0;
        // dd($tareas);
    @endphp
    <div class="container">
        @foreach ($tareas as $item)
            {{-- @continue(strtotime($item->FechaEntrega) < $hoy ) --}}
            {{-- {{strtotime($item->FechaEntrega)}},{{$hoy}} --}}
            @php
                // print_r($entregados);
                
                $fecha = date("d/m/Y", strtotime($item->FechaEntrega));
                $fechaC = date("d/m/Y", strtotime($item->FechaClase));
                $IsFor = true;
                $index = $item->id;
                // dd($archivosAl);
                
            @endphp
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-primary">
                     <div class="card-header">{{$item->Tema}} ({{$fechaC}}) - {{"Bimestre"}} {{$item->Bimestre}} {{$item->id}} <button class="btn btn-success" data-toggle="collapse" data-target="#multiCollapseExample{{$item->id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$item->id}}">+</button></div>
                        <div class="collapse multi-collapse" id="multiCollapseExample{{$item->id}}">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Indicaciones:</label>    {{$item->Observaciones}} <br>
                                        <label for="">Fecha de Entrega:</label>  {{$fecha}} <br>
                                        
                                        @if (isset($item->Reunion))
                                            <fieldset class="border p-2">
                                                <legend class="w-auto t16 text-primary"><b>Datos de la reunión:</b></legend>
                                                <label for="">URL:</label> <a href="{{$item->Reunion}}" target="_blank"><button class="btn btn-warning btn-sm">ir a clase virtual <i class="fa fa-tv"></i> </button></a><br>
                                                <label for="">ID:</label> {{$item->IDReunion}}<br>
                                                <label for="">Contraseña:</label> {{$item->Pass}}<br>
                                            </fieldset>
                                            
                                        @endif
                                        @if (count($archivos)>0)
                                            <fieldset class="border p-2">
                                                <legend class="w-auto t16 text-primary"><b>Archivos adjuntos:</b></legend>
                                                @foreach ($archivos as $arc)
                                                @php
                                                    $n++;
                                                @endphp
                                                    @continue($item->id != $arc->Tarea)
                                                    
                                                    <a title="Descargar Archivo" href="{{asset($arc->url)}}" download="{{$item->Tema}}" >{{$item->Tema}} {{"($n)"}}</a>
                                                    {{-- <a title="Descargar Archivo" href="{{asset($arc->url)}}" download="{{$arc->Nombre}}" >{{$arc->Nombre}} {{"($n)"}} <img src="{{asset($arc->url)}}" height="100" width="100" alt=""></a> --}}
                                                    <br>
                                                @endforeach
                                            </fieldset>
                                        @endif
                                        @if (count($links)>0)
                                            <fieldset class="border p-2">
                                                <legend class="w-auto t16 text-primary"><b>Links de apoyo:</b></legend>
                                                @foreach ($links as $arc)
                                                    @continue($item->id != $arc->Tarea)
                                                    <a href="{{asset($arc->url)}}" target="_blank">{{$arc->url}}</a>
                                                    <br>
                                                @endforeach
                                            </fieldset>
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-6 text-center">
                                    
                                    @if (isset($entregados[$index]["Tarea"]))
                                        <label class="text-primary text-center">Tarea entregada</label> <br>
                                        @if (isset($entregados[$index]["Nota"]))
                                        <label class="text-primary text-center">Calificacion</label>
                                            @if ($entregados[$index]["Nota"]>=11)
                                                <h1 class="text-primary">{{$entregados[$index]["Nota"]}}</h1> 
                                            @else
                                                <h1 class="text-danger">{{$entregados[$index]["Nota"]}}</h1> 
                                            @endif
                                       
                                        @else
                                            <label class="text-success text-center">Tarea aun no revisada</label>          
                                        @endif 
                                        <br>
                                        @if (isset($entregados[$index]["Comentario"]))
                                            <label class="text-primary text-center">Comentario del docente</label>
                                            <h5 class="text-success">{{$entregados[$index]["Comentario"]}}</h5>
                                         @endif
                                        <br>
                                        @if (count($archivosAl)>0)
                                            <fieldset class="border p-2">
                                                <legend class="w-auto t16 text-primary"><b>Archivos enviados:</b></legend>
                                                @foreach ($archivosAl as $arc)
                                                    @php
                                                        $m++;
                                                    @endphp
                                                    @continue($item->id != $arc->Tarea)
                                                    <a title="Descargar Archivo" href="{{asset($arc->url)}}" download="{{$item->Tema}}" >{{$item->Tema}} {{"($m)"}}</a>
                                                    {{-- <a title="Descargar Archivo" href="{{asset($arc->url)}}" download="{{$arc->Nombre}}" >{{$arc->Nombre}} <img src="{{asset($arc->url)}}" height="100" width="100" alt=""></a> --}}
                                                    <br>
                                                @endforeach
                                            </fieldset>
                                        @endif
                                       
                                    @else
                                        <uploads :id="{{$item->id}}"></uploads>
                                    @endif    
                                    
                                </div>  
                                    
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
        @if (!$IsFor)
            <h2 class="text-danger bg-warning text-center">No hay tareas por entregar</h2>
        @endif
    </div>
    {{-- <zcurso :ztareas="@json($tareas)"></zcurso> --}}

@endsection