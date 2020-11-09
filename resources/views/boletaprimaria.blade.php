<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleta Informativa</title>
</head>
<style>
    .borderarriba
    {
        border-top: black 1px dashed;
    }
    .negrita
    {
        font-weight: bold;
    }
    .border
    {
        /* border: solid 1px black; */
        border: black 1px dashed;
    }
    .t9
    {
        font-size: 12px; 
    }
    .t60
    {
        font-size: 60px; 
    }
    .t20
    {
        font-size: 20px; 
    }
    .texto
    {
        /* -webkit-text-stroke: 2px black; */
        text-shadow: 2px 2px #FF0000;
        color: rgb(119, 235, 119)
    }
    .centrartabla{
        margin: auto;
    }
    .verticalText {
    writing-mode: vertical-lr;
    transform: rotate(270deg);
    }
    .fondo{
        background-color: #adb5bd;
        font-weight: bold;
    }
    html { 
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -ms-overflow-style: scrollbar;
    -webkit-tap-highlight-color: transparent;
    }
    @-ms-viewport {
    width: device-width;
    }
    body {
    margin: 0;
    font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #ffffff;
    }
    @media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
    }
    @media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
    }
    @media (min-width: 1200px) {
    .container {
        max-width: 1140px;
    }
    }
    /* 
    .container-fluid {
    width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
    margin-right: auto;
    margin-left: auto;
    } */
    .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
    }
    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
    .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
    .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
    .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
    .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
    .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 7.5px;
    padding-left: 7.5px;
    }
    .col {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
    }
    .col-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
    }
    .col-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
    max-width: 8.333333%;
    }
    .col-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
    max-width: 16.666667%;
    }
    .col-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
    }
    .col-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
    max-width: 33.333333%;
    }
    .col-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
    max-width: 41.666667%;
    }
    .col-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
    }
    .col-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
    max-width: 58.333333%;
    }
    .col-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
    max-width: 66.666667%;
    }
    .col-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
    }
    .col-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
    max-width: 83.333333%;
    }
    .col-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
    max-width: 91.666667%;
    }
    .col-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
    }
    .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    }
    @media (min-width: 576px) {
    .container {
        max-width: 540px;
    }
    }
    @media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
    }
    @media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
    }
    @media (min-width: 1200px) {
    .container {
        max-width: 1140px;
    }
    }
    .container-fluid {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    }
    .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    }
    .text-justify {
    text-align: justify !important;
    }
    .text-nowrap {
    white-space: nowrap !important;
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
    .text-hide {
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
    }
    @media print {
    *,
    *::before,
    *::after {
        text-shadow: none !important;
        -webkit-box-shadow: none !important;
                box-shadow: none !important;
    }
    a:not(.btn) {
        text-decoration: underline;
    }
    abbr[title]::after {
        content: " (" attr(title) ")";
    }
    pre {
        white-space: pre-wrap !important;
    }
    pre,
    blockquote {
        border: 1px solid #adb5bd;
        page-break-inside: avoid;
    }
    thead {
        display: table-header-group;
    }
    tr,
    img {
        page-break-inside: avoid;
    }
    p,
    h2,
    h3 {
        orphans: 3;
        widows: 3;
    }
    h2,
    h3 {
        page-break-after: avoid;
    }
    @page {
        size: a3;
    }
    body {
        min-width: 992px !important;
    }
    .container {
        min-width: 992px !important;
    }
    .navbar {
        display: none;
    }
    .badge {
        border: 1px solid #000;
    }
    }
    /*!
    *  Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
    *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
    */
    /* FONT PATH
    * -------------------------- */
</style>
<body>
    @php
        function literal($number)
        {
            $result = "";
            if(is_numeric($number))
            {
                if($number>=0 && $number <=10) 
                {
                    $result    = 'C';
                
                }else if($number>=11 && $number <=13) 
                {
                    $result    = 'B';
                
                }else if($number>=14 && $number <=17) 
                {
                    $result    = 'A';
                
                }else if($number>=18 && $number <=20) 
                {
                    $result    = 'AD';
                
                }
            }
            return $result;
        }    
        function promedio($elements)
        {
            $acum = 0;
            $cont = 0;
            foreach ($elements as $key) {
                if($key != '')
                {
                    $acum += $key;
                    $cont += 1;
                }
            }
            
            $prom = ($acum != 0) ? ROUND($acum/$cont): '';
            return $prom;
        }
        $Anio = date("Y");
        //aritmetica
            $b1[1][1] = isset($notasb1[1][1]) ? $notasb1[1][1] : "";
            $b1[1][2] = isset($notasb1[1][2]) ? $notasb1[1][2] : "";
            $b1[1][3] = isset($notasb1[1][3]) ? $notasb1[1][3] : "";
            $b1[1][4] = isset($notasb1[1][4]) ? $notasb1[1][4] : "";
            
            $matematica1 = promedio(array($b1[1][1],$b1[1][2],$b1[1][3],$b1[1][4]));
            $b2[1][1] = isset($notasb2[1][1]) ? $notasb2[1][1] : "";
            $b2[1][2] = isset($notasb2[1][2]) ? $notasb2[1][2] : "";
            $b2[1][3] = isset($notasb2[1][3]) ? $notasb2[1][3] : "";
            $b2[1][4] = isset($notasb2[1][4]) ? $notasb2[1][4] : "";
            $matematica2 = promedio(array($b2[1][1],$b2[1][2],$b2[1][3],$b2[1][4]));
            $b3[1][1] = isset($notasb3[1][1]) ? $notasb3[1][1] : "";
            $b3[1][2] = isset($notasb3[1][2]) ? $notasb3[1][2] : "";
            $b3[1][3] = isset($notasb3[1][3]) ? $notasb3[1][3] : "";
            $b3[1][4] = isset($notasb3[1][4]) ? $notasb3[1][4] : "";
            $matematica3 = promedio(array($b3[1][1],$b3[1][2],$b3[1][3],$b3[1][4]));
            $b4[1][1] = isset($notasb4[1][1]) ? $notasb4[1][1] : "";
            $b4[1][2] = isset($notasb4[1][2]) ? $notasb4[1][2] : "";
            $b4[1][3] = isset($notasb4[1][3]) ? $notasb4[1][3] : "";
            $b4[1][4] = isset($notasb4[1][4]) ? $notasb4[1][4] : "";
            $matematica4 = promedio(array($b4[1][1],$b4[1][2],$b4[1][3],$b4[1][4]));
            $matematicaProm = promedio(array($matematica1,$matematica2,$matematica3,$matematica4));
        //rm
            $b1[2][1] = isset($notasb1[2][1]) ? $notasb1[2][1] : "";
            $b1[2][2] = isset($notasb1[2][2]) ? $notasb1[2][2] : "";
            $b1[2][3] = isset($notasb1[2][3]) ? $notasb1[2][3] : "";
            $b1[2][4] = isset($notasb1[2][4]) ? $notasb1[2][4] : ""; 
            $rm1 = promedio(array($b1[2][1],$b1[2][2],$b1[2][3],$b1[2][4])); 
            $b2[2][1] = isset($notasb2[2][1]) ? $notasb2[2][1] : "";
            $b2[2][2] = isset($notasb2[2][2]) ? $notasb2[2][2] : "";
            $b2[2][3] = isset($notasb2[2][3]) ? $notasb2[2][3] : "";
            $b2[2][4] = isset($notasb2[2][4]) ? $notasb2[2][4] : "";
            $rm2 = promedio(array($b2[2][1],$b2[2][2],$b2[2][3],$b2[2][4])); 
            $b3[2][1] = isset($notasb3[2][1]) ? $notasb3[2][1] : "";
            $b3[2][2] = isset($notasb3[2][2]) ? $notasb3[2][2] : "";
            $b3[2][3] = isset($notasb3[2][3]) ? $notasb3[2][3] : "";
            $b3[2][4] = isset($notasb3[2][4]) ? $notasb3[2][4] : "";
            $rm3 = promedio(array($b3[2][1],$b3[2][2],$b3[2][3],$b3[2][4])); 
            
            $b4[2][1] = isset($notasb4[2][1]) ? $notasb4[2][1] : "";
            $b4[2][2] = isset($notasb4[2][2]) ? $notasb4[2][2] : "";
            $b4[2][3] = isset($notasb4[2][3]) ? $notasb4[2][3] : "";
            $b4[2][4] = isset($notasb4[2][4]) ? $notasb4[2][4] : "";
            $rm4 = promedio(array($b4[2][1],$b4[2][2],$b4[2][3],$b4[2][4])); 
            $rmProm = promedio(array($rm1,$rm2,$rm3,$rm4)); 
            $mateb1 =promedio(array($matematica1,$rm1));            
            $mateb2 =promedio(array($matematica2,$rm2));            
            $mateb3 =promedio(array($matematica3,$rm3));            
            $mateb4 =promedio(array($matematica4,$rm4));            
            $mateProm = promedio(array($matematicaProm,$rmProm));
        //rv
            $b1[5][1] = isset($notasb1[5][1]) ? $notasb1[5][1] : "";
            $b1[5][2] = isset($notasb1[5][2]) ? $notasb1[5][2] : "";
            $b1[5][3] = isset($notasb1[5][3]) ? $notasb1[5][3] : "";

            $rv1 = promedio(array($b1[5][1],$b1[5][2],$b1[5][3])); 
            $b2[5][1] = isset($notasb2[5][1]) ? $notasb2[5][1] : "";
            $b2[5][2] = isset($notasb2[5][2]) ? $notasb2[5][2] : "";
            $b2[5][3] = isset($notasb2[5][3]) ? $notasb2[5][3] : "";

            $rv2 = promedio(array($b2[5][1],$b2[5][2],$b2[5][3])); 
            $b3[5][1] = isset($notasb3[5][1]) ? $notasb3[5][1] : "";
            $b3[5][2] = isset($notasb3[5][2]) ? $notasb3[5][2] : "";
            $b3[5][3] = isset($notasb3[5][3]) ? $notasb3[5][3] : "";

            $rv3 = promedio(array($b3[5][1],$b3[5][2],$b3[5][3])); 
            $b4[5][1] = isset($notasb4[5][1]) ? $notasb4[5][1] : "";
            $b4[5][2] = isset($notasb4[5][2]) ? $notasb4[5][2] : "";
            $b4[5][3] = isset($notasb4[5][3]) ? $notasb4[5][3] : "";

            $rv4 = promedio(array($b4[5][1],$b4[5][2],$b4[5][3])); 
            $rvProm = promedio(array($rv1,$rv2,$rv3,$rv4)); 
        //planlector
            $b1[4][1] = isset($notasb1[4][1]) ? $notasb1[4][1] : "";
            $b1[4][2] = isset($notasb1[4][2]) ? $notasb1[4][2] : "";
            $b1[4][3] = isset($notasb1[4][3]) ? $notasb1[4][3] : "";

            $pl1 = promedio(array($b1[4][1],$b1[4][2],$b1[4][3])); 
            $b2[4][1] = isset($notasb2[4][1]) ? $notasb2[4][1] : "";
            $b2[4][2] = isset($notasb2[4][2]) ? $notasb2[4][2] : "";
            $b2[4][3] = isset($notasb2[4][3]) ? $notasb2[4][3] : "";

            $pl2 = promedio(array($b2[4][1],$b2[4][2],$b2[4][3])); 
            $b3[4][1] = isset($notasb3[4][1]) ? $notasb3[4][1] : "";
            $b3[4][2] = isset($notasb3[4][2]) ? $notasb3[4][2] : "";
            $b3[4][3] = isset($notasb3[4][3]) ? $notasb3[4][3] : "";

            $pl3 = promedio(array($b3[4][1],$b3[4][2],$b3[4][3])); 
            $b4[4][1] = isset($notasb4[4][1]) ? $notasb4[4][1] : "";
            $b4[4][2] = isset($notasb4[4][2]) ? $notasb4[4][2] : "";
            $b4[4][3] = isset($notasb4[4][3]) ? $notasb4[4][3] : "";

            $pl4 = promedio(array($b4[4][1],$b4[4][2],$b4[4][3])); 
            $plProm = promedio(array($pl1,$pl2,$pl3,$pl4)); 
        //comunicacion
            $b1[3][1] = isset($notasb1[3][1]) ? $notasb1[3][1] : "";
            $b1[3][2] = isset($notasb1[3][2]) ? $notasb1[3][2] : "";
            $b1[3][3] = isset($notasb1[3][3]) ? $notasb1[3][3] : "";
            $comunicacion1 = promedio(array($b1[3][1],$b1[3][2],$b1[3][3])); 
            $b2[3][1] = isset($notasb2[3][1]) ? $notasb2[3][1] : "";
            $b2[3][2] = isset($notasb2[3][2]) ? $notasb2[3][2] : "";
            $b2[3][3] = isset($notasb2[3][3]) ? $notasb2[3][3] : "";
        
            $comunicacion2 = promedio(array($b2[3][1],$b2[3][2],$b2[3][3])); 
            $b3[3][1] = isset($notasb3[3][1]) ? $notasb3[3][1] : "";
            $b3[3][2] = isset($notasb3[3][2]) ? $notasb3[3][2] : "";
            $b3[3][3] = isset($notasb3[3][3]) ? $notasb3[3][3] : "";
         
            $comunicacion3 = promedio(array($b3[3][1],$b3[3][2],$b3[3][3])); 
            $b4[3][1] = isset($notasb4[3][1]) ? $notasb4[3][1] : "";
            $b4[3][2] = isset($notasb4[3][2]) ? $notasb4[3][2] : "";
            $b4[3][3] = isset($notasb4[3][3]) ? $notasb4[3][3] : "";
           
            $comunicacion4 = promedio(array($b4[3][1],$b4[3][2],$b4[3][3])); 

            $comunicacionP = promedio(array($comunicacion1,$comunicacion2,$comunicacion3,$comunicacion4)); 
            $comu1 = promedio(array($comunicacion1,$pl1,$rv1)); 
            $comu2 = promedio(array($comunicacion2,$pl2,$rv2)); 
            $comu3 = promedio(array($comunicacion3,$pl3,$rv3)); 
            $comu4 = promedio(array($comunicacion4,$pl4,$rv4)); 

            $comunicacionProm = promedio(array($rvProm,$comunicacionP,$plProm));
        //ingles
            $b1[6][1] = isset($notasb1[6][1]) ? $notasb1[6][1] : "";
            $b1[6][2] = isset($notasb1[6][2]) ? $notasb1[6][2] : "";
            $b1[6][3] = isset($notasb1[6][3]) ? $notasb1[6][3] : "";

            $ingles1   = promedio(array($b1[6][1],$b1[6][2],$b1[6][3])); 
            $b2[6][1] = isset($notasb2[6][1]) ? $notasb2[6][1] : "";
            $b2[6][2] = isset($notasb2[6][2]) ? $notasb2[6][2] : "";
            $b2[6][3] = isset($notasb2[6][3]) ? $notasb2[6][3] : "";

            $ingles2   = promedio(array($b2[6][1],$b2[6][2],$b2[6][3])); 
            $b3[6][1] = isset($notasb3[6][1]) ? $notasb3[6][1] : "";
            $b3[6][2] = isset($notasb3[6][2]) ? $notasb3[6][2] : "";
            $b3[6][3] = isset($notasb3[6][3]) ? $notasb3[6][3] : "";

            $ingles3   = promedio(array($b3[6][1],$b3[6][2],$b3[6][3])); 
            $b4[6][1] = isset($notasb4[6][1]) ? $notasb4[6][1] : "";
            $b4[6][2] = isset($notasb4[6][2]) ? $notasb4[6][2] : "";
            $b4[6][3] = isset($notasb4[6][3]) ? $notasb4[6][3] : "";

            $ingles4   = promedio(array($b4[6][1],$b4[6][2],$b4[6][3])); 
            $inglesProm   = promedio(array($ingles1,$ingles2,$ingles3,$ingles4)); 
        //arte
            $b1[7][1] = isset($notasb1[7][1]) ? $notasb1[7][1] : "";
            $b1[7][2] = isset($notasb1[7][2]) ? $notasb1[7][2] : "";
            $arte1     = promedio(array($b1[7][1],$b1[7][2])); 
            $b2[7][1] = isset($notasb2[7][1]) ? $notasb2[7][1] : "";
            $b2[7][2] = isset($notasb2[7][2]) ? $notasb2[7][2] : "";
            $arte2     = promedio(array($b2[7][1],$b2[7][2])); 
            $b3[7][1] = isset($notasb3[7][1]) ? $notasb3[7][1] : "";
            $b3[7][2] = isset($notasb3[7][2]) ? $notasb3[7][2] : "";
            $arte3     = promedio(array($b3[7][1],$b3[7][2])); 
            $b4[7][1] = isset($notasb4[7][1]) ? $notasb4[7][1] : "";
            $b4[7][2] = isset($notasb4[7][2]) ? $notasb4[7][2] : "";
            $arte4     = promedio(array($b4[7][1],$b4[7][2])); 
            $arteProm  = promedio(array($arte1,$arte2,$arte3,$arte4)); 
        //personal social
            $b1[8][1] = isset($notasb1[8][1]) ? $notasb1[8][1] : "";
            $b1[8][2] = isset($notasb1[8][2]) ? $notasb1[8][2] : "";
            $b1[8][3] = isset($notasb1[8][3]) ? $notasb1[8][3] : "";
            $b1[8][4] = isset($notasb1[8][4]) ? $notasb1[8][4] : "";
            $b1[8][5] = isset($notasb1[8][5]) ? $notasb1[8][5] : "";
            $social1  = promedio(array($b1[8][1],$b1[8][2],$b1[8][3],$b1[8][4],$b1[8][5])); 
            $b2[8][1] = isset($notasb2[8][1]) ? $notasb2[8][1] : "";
            $b2[8][2] = isset($notasb2[8][2]) ? $notasb2[8][2] : "";
            $b2[8][3] = isset($notasb2[8][3]) ? $notasb2[8][3] : "";
            $b2[8][4] = isset($notasb2[8][4]) ? $notasb2[8][4] : "";
            $b2[8][5] = isset($notasb2[8][5]) ? $notasb2[8][5] : "";
            $social2  = promedio(array($b2[8][1],$b2[8][2],$b2[8][3],$b2[8][4],$b2[8][5])); 
            $b3[8][1] = isset($notasb3[8][1]) ? $notasb3[8][1] : "";
            $b3[8][2] = isset($notasb3[8][2]) ? $notasb3[8][2] : "";
            $b3[8][3] = isset($notasb3[8][3]) ? $notasb3[8][3] : "";
            $b3[8][4] = isset($notasb3[8][4]) ? $notasb3[8][4] : "";
            $b3[8][5] = isset($notasb3[8][5]) ? $notasb3[8][5] : "";
            $social3  = promedio(array($b3[8][1],$b3[8][2],$b3[8][3],$b3[8][4],$b3[8][5])); 
            $b4[8][1] = isset($notasb4[8][1]) ? $notasb4[8][1] : "";
            $b4[8][2] = isset($notasb4[8][2]) ? $notasb4[8][2] : "";
            $b4[8][3] = isset($notasb4[8][3]) ? $notasb4[8][3] : "";
            $b4[8][4] = isset($notasb4[8][4]) ? $notasb4[8][4] : "";
            $b4[8][5] = isset($notasb4[8][5]) ? $notasb4[8][5] : "";
            $social4  = promedio(array($b4[8][1],$b4[8][2],$b4[8][3],$b4[8][4],$b4[8][5])); 
            $socialProm  = promedio(array($social1,$social2,$social3,$social4)); 
        //educ fisica
            $b1[9][1] = isset($notasb1[9][1]) ? $notasb1[9][1] : "";
            $b1[9][2] = isset($notasb1[9][2]) ? $notasb1[9][2] : "";
            $b1[9][3] = isset($notasb1[9][3]) ? $notasb1[9][3] : "";
            $ef1       = promedio(array($b1[9][1],$b1[9][2],$b1[9][3])); 
            $b2[9][1] = isset($notasb2[9][1]) ? $notasb2[9][1] : "";
            $b2[9][2] = isset($notasb2[9][2]) ? $notasb2[9][2] : "";
            $b2[9][3] = isset($notasb2[9][3]) ? $notasb2[9][3] : "";
            $ef2       = promedio(array($b2[9][1],$b2[9][2],$b2[9][3])); 
            $b3[9][1] = isset($notasb3[9][1]) ? $notasb3[9][1] : "";
            $b3[9][2] = isset($notasb3[9][2]) ? $notasb3[9][2] : "";
            $b3[9][3] = isset($notasb3[9][3]) ? $notasb3[9][3] : "";
            $ef3       = promedio(array($b3[9][1],$b3[9][2],$b3[9][3])); 
            $b4[9][1] = isset($notasb4[9][1]) ? $notasb4[9][1] : "";
            $b4[9][2] = isset($notasb4[9][2]) ? $notasb4[9][2] : "";
            $b4[9][3] = isset($notasb4[9][3]) ? $notasb4[9][3] : "";
            $ef4       = promedio(array($b4[9][1],$b4[9][2],$b4[9][3])); 
            $efProm    = promedio(array($ef1,$ef2,$ef3,$ef4)); 
        //educ religiosa
            $b1[10][1] = isset($notasb1[10][1]) ? $notasb1[10][1] : "";
            $b1[10][2] = isset($notasb1[10][2]) ? $notasb1[10][2] : "";
            $er1       = promedio(array($b1[10][1],$b1[10][2])); 
            $b2[10][1] = isset($notasb2[10][1]) ? $notasb2[10][1] : "";
            $b2[10][2] = isset($notasb2[10][2]) ? $notasb2[10][2] : "";
            $er2       = promedio(array($b2[10][1],$b2[10][2])); 
            $b3[10][1] = isset($notasb3[10][1]) ? $notasb3[10][1] : "";
            $b3[10][2] = isset($notasb3[10][2]) ? $notasb3[10][2] : "";
            $er3       = promedio(array($b3[10][1],$b3[10][2])); 
            $b4[10][1] = isset($notasb4[10][1]) ? $notasb4[10][1] : "";
            $b4[10][2] = isset($notasb4[10][2]) ? $notasb4[10][2] : "";
            $er4       = promedio(array($b4[10][1],$b4[10][2])); 
            $erProm    = promedio(array($er1,$er2,$er3,$er4)); 
        //ciencia
            $b1[11][1] = isset($notasb1[11][1]) ? $notasb1[11][1] : "";
            $b1[11][2] = isset($notasb1[11][2]) ? $notasb1[11][2] : "";
            $b1[11][3] = isset($notasb1[11][3]) ? $notasb1[11][3] : "";
            $ciencia1       = promedio(array($b1[11][1],$b1[11][2],$b1[11][3])); 
            $b2[11][1] = isset($notasb2[11][1]) ? $notasb2[11][1] : "";
            $b2[11][2] = isset($notasb2[11][2]) ? $notasb2[11][2] : "";
            $b2[11][3] = isset($notasb2[11][3]) ? $notasb2[11][3] : "";
            $ciencia2       = promedio(array($b2[11][1],$b2[11][2],$b2[11][3])); 
            $b3[11][1] = isset($notasb3[11][1]) ? $notasb3[11][1] : "";
            $b3[11][2] = isset($notasb3[11][2]) ? $notasb3[11][2] : "";
            $b3[11][3] = isset($notasb3[11][3]) ? $notasb3[11][3] : "";
            $ciencia3       = promedio(array($b3[11][1],$b3[11][2],$b3[11][3])); 
            $b4[11][1] = isset($notasb4[11][1]) ? $notasb4[11][1] : "";
            $b4[11][2] = isset($notasb4[11][2]) ? $notasb4[11][2] : "";
            $b4[11][3] = isset($notasb4[11][3]) ? $notasb4[11][3] : "";
            $ciencia4       = promedio(array($b4[11][1],$b4[11][2],$b4[11][3])); 
            $cienciaProm    = promedio(array($ciencia1,$ciencia2,$ciencia3,$ciencia4)); 
        //gsama
            $b1[12][1] = isset($notasb1[12][1]) ? $notasb1[12][1] : "";
            $gsama1  = $b1[12][1]; 

            $b2[12][1] = isset($notasb2[12][1]) ? $notasb2[12][1] : "";
            $gsama2  = $b2[12][1]; 

            $b3[12][1] = isset($notasb3[12][1]) ? $notasb3[12][1] : "";
            $gsama3  = $b3[12][1]; 

            $b4[12][1] = isset($notasb4[12][1]) ? $notasb4[12][1] : "";
            $gsama4  = $b4[12][1];

            $gsamaProm    = promedio(array($gsama1,$gsama2,$gsama3,$gsama4));     
        //tics
            $b1[13][1] = isset($notasb1[13][1]) ? $notasb1[13][1] : "";
            $tics1  = $b1[13][1]; 

            $b2[13][1] = isset($notasb2[13][1]) ? $notasb2[13][1] : "";
            $tics2  = $b2[13][1]; 

            $b3[13][1] = isset($notasb3[13][1]) ? $notasb3[13][1] : "";
            $tics3  = $b3[13][1]; 

            $b4[13][1] = isset($notasb4[13][1]) ? $notasb4[13][1] : "";
            $tics4  = $b4[13][1];

            $ticsProm    = promedio(array($tics1,$tics2,$tics3,$tics4));   
        
    @endphp
    <div class="container-fluid">
        <table class="text-center centrartabla">
            <tr>
                <td rowspan="2" style="vertical-align: text-top"><img src="img/escudo.png" height="100" width="100" alt="" srcset=""></td>
                <td class="texto t60 negrita">BOLETA</td>
                <td rowspan="2" style="vertical-align: text-top"><img src="images/logo1.png" height="40" width="150" alt="" srcset=""></td>
            </tr>
            <tr>
                <td class="texto t60 negrita text-center">INFORMATIVA</td>
            </tr>
            <tr>
                <td colspan="3" class="text-center" style="vertical-align: middle"><img src="images/logo.png" height="100" width="100" alt="" srcset=""></td>
            </tr>
            <tr>
                <td colspan="3" class="texto t20 text-center">{{$Anio}}</td>
            </tr>
        </table>
        <br>
        <table class="centrartabla t9">
            <tr>
                <td class="text-left negrita " colspan="2">DATOS DEL ESTUDIANTE:</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">APELLIDOS Y NOMBRES:</td>
                <td width="15   0" class="border text-center">
                    @if (isset($dato->alumno))
                        {{$dato->alumno}}
                    @endif    
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">DNI:</td>
                <td class="border text-center">
                    @if (isset($dato->DNI))
                        {{$dato->DNI}}
                    @endif    
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">CÓDIGO DEL EDUCANDO:</td>
                <td class="border text-center">
                    @if (isset($dato->DNI))
                        {{$dato->DNI}}
                    @endif    
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr colspan="2">
                <td class="text-left negrita">DATOS DE LA INSTITUCIÓN:</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">CÓDIGO MODULAR:</td>
                <td class="border text-center">{{""}}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">NIVEL:</td>
                <td class="border text-center">
                    @if (isset($dato->Nivel))
                     {{$dato->Nivel}}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">GRADO:</td>
                <td class="border text-center">
                    @if (isset($dato->grado))
                        {{$dato->grado}}
                    @endif    
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">SECCIÓN:</td>
                <td class="border text-center">
                    @if (isset($dato->seccion))
                        {{$dato->seccion}}
                    @endif    
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right negrita">TUTOR(A):</td>
                <td class="border text-center">
                    @if (isset($tutor))
                        {{$tutor}}    
                    @else 
                        {{"Docente no asignado"}}    
                    @endif
                    
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
           
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="text-center borderarriba">HERLES VALDIVIA RENGIFO <br> DIRECTOR DE LA I.E.P. SOLLERTIA</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="text-center negrita" colspan="2">PUCALLPA - PERÚ</td>
            </tr>
        </table>
       <div style="page-break-after:always;"></div>
        <div class="row">
            <table border="1" cellpadding="0" cellspacing="0" class="text-center" style="font-size: 9px">
                <tr class="fondo">
                    <td rowspan="3" width="90"><b>AREA</b></td>
                    <td rowspan="3" width="160" class="fondo"><b>COMPETENCIA</b></td>
                    <td colspan="4" width="120" class="fondo"><b>BIMESTRE</b></td>
                    <td rowspan="2" width="30" class="fondo" style="font-size: 9px"><b>CALIFICACIÓN.<br>FINAL.</b></td>
                </tr>
                <tr>
                    <td><b>I</b></td>
                    <td><b>II</b></td>
                    <td><b>III</b></td>
                    <td><b>IV</b></td>
                </tr>
                <tr>
                    <td><b>L</b></td>
                    <td><b>L</b></td>
                    <td><b>L</b></td>
                    <td><b>L</b></td>
                    <td><b>L</b></td>
                </tr>
                <tr>
                    {{-- <td rowspan="25" class="fondo" width="50" style="font-size: 10px"><p class="verticalText"><b>MATEMÁTICAS</b></p></td> --}}
                    <td class="text-center" rowspan="5"><b>MATEMÁTICA</b></td>
                    <td class="text-left">Resuelve problemas de cantidad</td>
                    <td>{{literal($b1[1][1])}}</td>
                    <td>{{literal($b2[1][1])}}</td>
                    <td>{{literal($b3[1][1])}}</td>
                    <td>{{literal($b4[1][1])}}</td>
                    <td rowspan="5" style="font-size: 16px">{{literal($matematicaProm)}}</td>
                </tr>
                <tr>
                    <td class="text-left">Resuelve problemas de regularidad, equivalencia y cambio</td>
                    <td>{{literal($b1[1][2])}}</td>
                    <td>{{literal($b2[1][2])}}</td>
                    <td>{{literal($b3[1][2])}}</td>
                    <td>{{literal($b4[1][2])}}</td>
                </tr>
                <tr>
                    <td class="text-left">Resuelve problemas de movimiento, forma y localización</td>
                    <td>{{literal($b1[1][3])}}</td>
                    
                    <td>{{literal($b2[1][3])}}</td>
                    
                    <td>{{literal($b3[1][3])}}</td>
                    
                    <td>{{literal($b4[1][3])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Resuelve problemas de gestión de datos e incertidumbre</td>
                    <td>{{literal($b1[1][4])}}</td>
                    
                    <td>{{literal($b2[1][4])}}</td>
                    
                    <td>{{literal($b3[1][4])}}</td>
                    
                    <td>{{literal($b4[1][4])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left"><b>CALIFICACIÓN DEL PERIODO</b></td>
                    <td><b>{{literal($matematica1)}}</b></td>
                    
                    <td><b>{{literal($matematica2)}}</b></td>
                    
                    <td><b>{{literal($matematica3)}}</b></td>
                    
                    <td><b>{{literal($matematica4)}}</b></td>
                    
                </tr>
                <tr>
                    <td class="text-center" rowspan="5"><b>RAZ.<br>MATEMÁTICO</b></td>
                    <td class="text-left">Resuelve problemas de cantidad</td>
                    <td>{{literal($b1[2][1])}}</td>
                    <td>{{literal($b2[2][1])}}</td>
                    <td>{{literal($b3[2][1])}}</td>
                    <td>{{literal($b4[2][1])}}</td>
                    <td rowspan="5" style="font-size: 16px">{{literal($rmProm)}}</td>
                </tr>
                <tr>
                    <td class="text-left">Resuelve problemas de regularidad, equivalencia y cambio</td>
                    <td>{{literal($b1[2][2])}}</td>
                    <td>{{literal($b2[2][2])}}</td>
                    <td>{{literal($b3[2][2])}}</td>
                    <td>{{literal($b4[2][2])}}</td>
                </tr>
                <tr>
                    <td class="text-left">Resuelve problemas de movimiento, forma y localización</td>
                    <td>{{literal($b1[2][3])}}</td>
                    <td>{{literal($b2[2][3])}}</td>
                    <td>{{literal($b3[2][3])}}</td>
                    <td>{{literal($b4[2][3])}}</td>
                </tr>
                <tr>
                    <td class="text-left">Resuelve problemas de gestión de datos e incertidumbre</td>
                    <td>{{literal($b1[2][4])}}</td>
                    <td>{{literal($b2[2][4])}}</td>
                    <td>{{literal($b3[2][4])}}</td>
                    <td>{{literal($b4[2][4])}}</td>
                </tr>
                <tr>
                    <td class="text-left"><b>CALIFICACIÓN DEL PERIODO</b></td>
                    <td><b>{{literal($rm1)}}</b></td>
                    <td><b>{{literal($rm2)}}</b></td>
                    <td><b>{{literal($rm3)}}</b></td>
                    <td><b>{{literal($rm4)}}</b></td>
                </tr>
                <tr class="fondo">
                    <td style="  height:17px">MATEMÁTICA</td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($mateb1)}}</td>
                    <td style="  height:17px">{{literal($mateb2)}}</td>
                    <td style="  height:17px">{{literal($mateb3)}}</td>
                    <td style="  height:17px">{{literal($mateb4)}}</td>
                    <td style="  height:17px">{{literal($mateProm)}}</td>
                </tr>
                <tr>
                    {{-- <td rowspan="20"  class="fondo"  style="font-size: 10px"><p class="verticalText"><b>COMUNICACIÓN</b></p></td> --}}
                    <td class="text-center" rowspan="4"><b>COMUNICACIÓN</b></td>
                    <td class="text-left">Se comunica oralmente en lengua materna</td>
                    <td>{{literal($b1[3][1])}}</td>
                    <td>{{literal($b2[3][1])}}</td>
                    <td>{{literal($b3[3][1])}}</td>
                    <td>{{literal($b4[3][1])}}</td>
                    <td rowspan="4" style="font-size: 16px">{{literal($comunicacionP)}}</td>
                </tr>
                <tr>
                    <td class="text-left">Lee diversos tipos de textos escritos</td>
                    <td>{{literal($b1[3][2])}}</td>
                    
                    <td>{{literal($b2[3][2])}}</td>
                    
                    <td>{{literal($b3[3][2])}}</td>
                    
                    <td>{{literal($b4[3][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Escribe diversos tipos de textos</td>
                    <td>{{literal($b1[3][3])}}</td>
                    
                    <td>{{literal($b2[3][3])}}</td>
                    
                    <td>{{literal($b3[3][3])}}</td>
                    
                    <td>{{literal($b4[3][3])}}</td>
                    
                </tr>
              
                <tr>
                    <td class="text-left"><b>CALIFICACIÓN DEL PERIODO</b></td>
                    <td><b>{{literal($comunicacion1)}}</b></td>
                    
                    <td><b>{{literal($comunicacion2)}}</b></td>
                    
                    <td><b>{{literal($comunicacion3)}}</b></td>
                    
                    <td><b>{{literal($comunicacion4)}}</b></td>
                    
                </tr>
                <tr>
                    <td class="text-center" rowspan="4"><b>TALLER DE <br> LECTURA</b></td>
                    <td class="text-left">Se comunica oralmente en lengua materna</td>
                    <td>{{literal($b1[4][1])}}</td>
                    
                    <td>{{literal($b2[4][1])}}</td>
                    
                    <td>{{literal($b3[4][1])}}</td>
                    
                    <td>{{literal($b4[4][1])}}</td>
                    
                    
                    <td rowspan="4" style="font-size: 16px">{{literal($plProm)}}</td>
                </tr>
                <tr>
                    <td class="text-left">Lee diversos tipos de textos escritos</td>
                    <td>{{literal($b1[4][2])}}</td>
                    
                    <td>{{literal($b2[4][2])}}</td>
                    
                    <td>{{literal($b3[4][2])}}</td>
                    
                    <td>{{literal($b4[4][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Escribe diversos tipos de textos</td>
                    <td>{{literal($b1[4][3])}}</td>
                    
                    <td>{{literal($b2[4][3])}}</td>
                    
                    <td>{{literal($b3[4][3])}}</td>
                    
                    <td>{{literal($b4[4][3])}}</td>
                    
                </tr>
                
                <tr>
                    <td class="text-left"><b>CALIFICACIÓN DEL PERIODO</b></td>
                    <td><b>{{literal($pl1)}}</b></td>
                    
                    <td><b>{{literal($pl2)}}</b></td>
                    
                    <td><b>{{literal($pl3)}}</b></td>
                    
                    <td><b>{{literal($pl4)}}</b></td>
                    
                </tr>
                <tr>
                    <td class="text-center" rowspan="4"><b>RAZONAMIENTO <br> VERBAL</b></td>
                    <td class="text-left">Se comunica oralmente en lengua materna</td>
                    <td>{{literal($b1[5][1])}}</td>
                    
                    <td>{{literal($b2[5][1])}}</td>
                    
                    <td>{{literal($b3[5][1])}}</td>
                    
                    <td>{{literal($b4[5][1])}}</td>
                    
                    
                    <td rowspan="4" style="font-size: 16px">{{literal($rvProm)}}</td>
                </tr>
                <tr>
                    <td class="text-left">Lee diversos tipos de textos escritos</td>
                    <td>{{literal($b1[5][2])}}</td>
                    
                    <td>{{literal($b2[5][2])}}</td>
                    
                    <td>{{literal($b3[5][2])}}</td>
                    
                    <td>{{literal($b4[5][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Escribe diversos tipos de textos</td>
                    <td>{{literal($b1[5][3])}}</td>
                    
                    <td>{{literal($b2[5][3])}}</td>
                    
                    <td>{{literal($b3[5][3])}}</td>
                    
                    <td>{{literal($b4[5][3])}}</td>
                    
                </tr>
                
                <tr>
                    <td class="text-left"><b>CALIFICACIÓN DEL PERIODO</b></td>
                    <td><b>{{literal($rv1)}}</b></td>
                    
                    <td><b>{{literal($rv2)}}</b></td>
                    
                    <td><b>{{literal($rv3)}}</b></td>
                    
                    <td><b>{{literal($rv4)}}</b></td>
                    
                </tr>
              
                <tr class="fondo">
                    <td style="  height:17px">COMUNICACIÓN</td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($comu1)}}</td>
                    
                    <td style="  height:17px">{{literal($comu2)}}</td>
                    
                    <td style="  height:17px">{{literal($comu3)}}</td>
                    
                    <td style="  height:17px">{{literal($comu4)}}</td>
                    
                    
                    <td style="  height:17px">{{literal($comunicacionProm)}}</td>
                </tr>
                <tr>
                    <td rowspan="3"><b>INGLÉS COMO <br>LENGUA <br>EXTRANJERA</b></td>
                    <td class="text-left">Se comunica oralmente en Inglés como lengua extranjera</td>
                    <td>{{literal($b1[6][1])}}</td>
                    
                    <td>{{literal($b2[6][1])}}</td>
                    
                    <td>{{literal($b3[6][1])}}</td>
                    
                    <td>{{literal($b4[6][1])}}</td>
                    
                     <!-- CALIFICACIÓN DEL PERIODO -->
                    <td rowspan="3" style="font-size: 16px">{{literal($inglesProm)}}</td> <!-- CALIFICACIÓN DEL PERIODO -->
                    {{-- <td rowspan="5" style="font-size: 16px">{{$inglesProm}}</td> --}}
                    {{--  --}}
                </tr>
                <tr>
                    <td class="text-left">Lee diversos tipos de textos en Inglés como lengua extranjera</td>
                    <td>{{literal($b1[6][2])}}</td>
                    
                    <td>{{literal($b2[6][2])}}</td>
                    
                    <td>{{literal($b3[6][2])}}</td>
                    
                    <td>{{literal($b4[6][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Escribe diversos tipos de textos Inglés como lengua extranjera</td>
                    <td>{{literal($b1[6][3])}}</td>
                    
                    <td>{{literal($b2[6][3])}}</td>
                    
                    <td>{{literal($b3[6][3])}}</td>
                    
                    <td>{{literal($b4[6][3])}}</td>
                    
                </tr>
                <tr class="fondo">
                    <td style="  height:17px">INGLÉS</td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($ingles1)}}</td>
                    
                    <td style="  height:17px">{{literal($ingles2)}}</td>
                    
                    <td style="  height:17px">{{literal($ingles3)}}</td>
                    
                    <td style="  height:17px">{{literal($ingles4)}}</td>
                    
                    
                    <td style="  height:17px">{{literal($inglesProm)}}</td>
                </tr>
                <tr>
                    <td rowspan="2"><b>ARTE</b></td>
                    <td class="text-left">Aprecia de manera crítica manifestaciones artístico-culturales</td>
                    <td>{{literal($b1[7][1])}}</td>
                    
                    <td>{{literal($b2[7][1])}}</td>
                    
                    <td>{{literal($b3[7][1])}}</td>
                    
                    <td>{{literal($b4[7][1])}}</td>
                    
                     <!-- CALIFICACIÓN DEL PERIODO -->
                    <td rowspan="2">{{literal($arteProm)}}</td> <!-- CALIFICACIÓN DEL PERIODO -->
                    {{-- <td rowspan="3">{{$arteProm}}</td> --}}
                    {{--  --}}
                </tr>
                <tr>
                    <td class="text-left">Crea proyectos desde los lenguajes artísticos</td>
                    <td>{{literal($b1[7][2])}}</td>
                    
                    <td>{{literal($b2[7][2])}}</td>
                    
                    <td>{{literal($b3[7][2])}}</td>
                    
                    <td>{{literal($b4[7][2])}}</td>
                    
                </tr>
              
                <tr class="fondo">
                    <td style="  height:17px">ARTE</td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($arte1)}}</td>
                    
                    <td style="  height:17px">{{literal($arte2)}}</td>
                    
                    <td style="  height:17px">{{literal($arte3)}}</td>
                    
                    <td style="  height:17px">{{literal($arte4)}}</td>
                    
                    
                    <td style="  height:17px">{{literal($arteProm)}}</td>
                </tr>
                
                <tr>
                    {{-- <td rowspan="10"><p class="verticalText"><b>CIENCIAS SOCIALES</b></p></td> --}}
                    <td class="text-center" rowspan="5"><b>PERSONAL SOCIAL</b></td>
                    <td class="text-left">Construye su identidad</td>
                    <td>{{literal($b1[8][1])}}</td>
                    
                    <td>{{literal($b2[8][1])}}</td>
                    
                    <td>{{literal($b3[8][1])}}</td>
                    
                    <td>{{literal($b4[8][1])}}</td>
                    
                     <!-- CALIFICACIÓN DEL PERIODO -->
                    <td rowspan="5" style="font-size: 16px">{{literal($socialProm)}}</td> <!-- CALIFICACIÓN DEL PERIODO -->
                </tr>
                <tr>
                    <td class="text-left">Convive y participa democráticamente</td>
                    <td>{{literal($b1[8][2])}}</td>
                    
                    <td>{{literal($b2[8][2])}}</td>
                    
                    <td>{{literal($b3[8][2])}}</td>
                    
                    <td>{{literal($b4[8][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Construye interpretaciones históricas</td>
                    <td>{{literal($b1[8][3])}}</td>
                    
                    <td>{{literal($b2[8][3])}}</td>
                    
                    <td>{{literal($b3[8][3])}}</td>
                    
                    <td>{{literal($b4[8][3])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">	Gestiona responsablemente el espacio y el ambiente</td>
                    <td>{{literal($b1[8][4])}}</td>
                    
                    <td>{{literal($b2[8][4])}}</td>
                    
                    <td>{{literal($b3[8][4])}}</td>
                    
                    <td>{{literal($b4[8][4])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Gestiona responsablemente los recursos económicos</td>
                    <td>{{literal($b1[8][5])}}</td>
                    
                    <td>{{literal($b2[8][5])}}</td>
                    
                    <td>{{literal($b3[8][5])}}</td>
                    
                    <td>{{literal($b4[8][5])}}</td>
                    
                </tr>
                <tr class="fondo">
                    <td style="  height:17px"><b>PERSONAL SOCIAL</b></td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($social1)}}</td><!--B1 N-->
                    <!--B1 L-->
                    <td style="  height:17px">{{literal($social2)}}</td><!--B2 N-->
                    <!--B2 L-->
                    <td style="  height:17px">{{literal($social3)}}</td><!--B3 N-->
                    <!--B3 L-->
                    <td style="  height:17px">{{literal($social4)}}</td><!--B4 N-->
                    <!--B4 L-->
                    <!--P N-->
                    <td style="  height:17px">{{literal($socialProm)}}</td><!--P L-->
                </tr>
                <tr>
                    <td rowspan="3"><b>EDUCACIÓN<br>FÍSICA </b></td>
                    <td class="text-left">Se desenvuelve de manera autónoma a través de su motricidad </td>
                    <td>{{literal($b1[9][1])}}</td>
                    
                    <td>{{literal($b2[9][1])}}</td>
                    
                    <td>{{literal($b3[9][1])}}</td>
                    
                    <td>{{literal($b4[9][1])}}</td>
                    
                     <!-- CALIFICACIÓN DEL PERIODO -->
                    <td rowspan="3">{{literal($efProm)}}</td> <!-- CALIFICACIÓN DEL PERIODO -->
                    {{-- <td rowspan="4">{{$efProm}}</td> --}}
                    {{-- <td rowspan="4">{{$efProm}}</td> --}}
                </tr>
                <tr>
                    <td class="text-left">Asume una vida saludable</td>
                    <td>{{literal($b1[9][2])}}</td>
                    
                    <td>{{literal($b2[9][2])}}</td>
                    
                    <td>{{literal($b3[9][2])}}</td>
                    
                    <td>{{literal($b4[9][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Interactúa a través de sus habilidades sociomotrices</td>
                    <td>{{literal($b1[9][2])}}</td>
                    
                    <td>{{literal($b2[9][2])}}</td>
                    
                    <td>{{literal($b3[9][2])}}</td>
                    
                    <td>{{literal($b4[9][2])}}</td>
                    
                </tr>
                <tr class="fondo">
                    <td style="  height:17px">EE.FF</td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($ef1)}}</td>
                    
                    <td style="  height:17px">{{literal($ef2)}}</td>
                    
                    <td style="  height:17px">{{literal($ef3)}}</td>
                    
                    <td style="  height:17px">{{literal($ef4)}}</td>
                    
                    
                    <td style="  height:17px">{{literal($efProm)}}</td>
                </tr>
                <tr>
                    <td rowspan="2"><b>EDUCACIÓN <br>RELIGIOSA</b></td>
                    <td class="text-left">Construye su identidad como persona humana, amada… cercanas </td>
                    <td>{{literal($b1[10][1])}}</td>
                    
                    <td>{{literal($b2[10][1])}}</td>
                    
                    <td>{{literal($b3[10][1])}}</td>
                    
                    <td>{{literal($b4[10][1])}}</td>
                    
                     <!-- CALIFICACIÓN DEL PERIODO -->
                    <td rowspan="2">{{literal($erProm)}}</td> <!-- CALIFICACIÓN DEL PERIODO -->
                    {{-- <td rowspan="3">{{$erProm}}</td> --}}
                    {{--  --}}
                </tr>
                <tr>
                    <td class="text-left">Asume la experiencia del encuentro personal y comunitario ... religiosa</td>
                    <td>{{literal($b1[10][2])}}</td>
                    
                    <td>{{literal($b2[10][2])}}</td>
                    
                    <td>{{literal($b3[10][2])}}</td>
                    
                    <td>{{literal($b4[10][2])}}</td>
                    
                </tr>
                <tr class="fondo">
                    <td style="  height:17px">EE.RR</td>
                    <td style="  height:17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="  height:17px">{{literal($er1)}}</td>
                    
                    <td style="  height:17px">{{literal($er2)}}</td>
                    
                    <td style="  height:17px">{{literal($er3)}}</td>
                    
                    <td style="  height:17px">{{literal($er4)}}</td>
                    
                    
                    <td style="  height:17px">{{literal($erProm)}}</td>
                </tr>
                <tr>
                    {{-- <td rowspan="15" style="font-size: 10px"><p class="verticalText"><b>CIENCIA <br>TECNOLOGÍA <br>Y AMBIENTE</b></p></td> --}}
                    <td class="text-center" rowspan="3"><b>CIENCIA Y <br>TECNOLOGÍA</b></td>
                    <td class="text-left">Indaga mediante métodos científicos</td>
                    <td>{{literal($b1[11][1])}}</td>
                    
                    <td>{{literal($b2[11][1])}}</td>
                    
                    <td>{{literal($b3[11][1])}}</td>
                    
                    <td>{{literal($b4[11][1])}}</td>
                    
                    
                    <td rowspan="3" style="font-size: 16px">{{literal($cienciaProm)}}</td>
                    {{-- <td rowspan="15" style="font-size: 16px">{{$cienciasProm}}</td> --}}
                    {{-- <td rowspan="15" style="font-size: 16px"></td> --}}
                </tr>
                <tr>
                    <td class="text-left">Explica el mundo físico</td>
                    <td>{{literal($b1[11][2])}}</td>
                    
                    <td>{{literal($b2[11][2])}}</td>
                    
                    <td>{{literal($b3[11][2])}}</td>
                    
                    <td>{{literal($b4[11][2])}}</td>
                    
                </tr>
                <tr>
                    <td class="text-left">Diseña y produce prototipos tecnológicos</td>
                    <td>{{literal($b1[11][3])}}</td>
                    
                    <td>{{literal($b2[11][3])}}</td>
                    
                    <td>{{literal($b3[11][3])}}</td>
                    
                    <td>{{literal($b4[11][3])}}</td>
                    
                </tr>
                <tr class="fondo">
                    <td style="height: 17px">C Y T</td>
                    <td style="height: 17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="height: 17px">{{literal($ciencia1)}}</td>
                    
                    <td style="height: 17px">{{literal($ciencia2)}}</td>
                    
                    <td style="height: 17px">{{literal($ciencia3)}}</td>
                    
                    <td style="height: 17px">{{literal($ciencia4)}}</td>
                    
                    
                    <td style="height: 17px">{{literal($cienciaProm)}}</td>
                </tr>
                <tr>
                    <td rowspan="1"><b>GESTIONA</b></td>
                    <td class="text-left">Gestiona su aprendizaje de manera autónoma </td>
                    <td>{{literal($b1[12][1])}}</td>
                    <td>{{literal($b2[12][1])}}</td>
                    <td>{{literal($b3[12][1])}}</td>
                    <td>{{literal($b4[12][1])}}</td>
                    <td rowspan="1">{{literal($gsamaProm)}}</td>
                </tr>
                <tr class="fondo">
                    <td style="height: 17px">GSAMA(2)</td>
                    <td style="height: 17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="height: 17px">{{literal($gsama1)}}</td>
                    <td style="height: 17px">{{literal($gsama2)}}</td>
                    <td style="height: 17px">{{literal($gsama3)}}</td>
                    <td style="height: 17px">{{literal($gsama4)}}</td>
                    <td style="height: 17px">{{literal($gsamaProm)}}</td>
                </tr>
                <tr>
                    <td rowspan="1"><b>TIC (2) </b></td>
                    <td class="text-left">Se desenvuelve en entornos virtuales generados por las TIC</td>
                    <td>{{literal($b1[13][1])}}</td>
                    
                    <td>{{literal($b2[13][1])}}</td>
                    
                    <td>{{literal($b3[13][1])}}</td>
                    
                    <td>{{literal($b4[13][1])}}</td>
                    
                    <td rowspan="1">{{literal($ticsProm)}}</td>
                </tr>
                <tr class="fondo">
                    <td style="height: 17px">TIC </td>
                    <td style="height: 17px">CALIFICACIÓN DEL BIMESTRE</td>
                    <td style="height: 17px">{{literal($tics1)}}</td>
                    
                    <td style="height: 17px">{{literal($tics2)}}</td>
                    
                    <td style="height: 17px">{{literal($tics3)}}</td>
                    
                    <td style="height: 17px">{{literal($tics4)}}</td>
                    
                    
                    <td style="height: 17px">{{literal($ticsProm)}}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><b>PUNTAJE </b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><b>PROMEDIO PONDERADO</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><b>ORDEN DE MERITO EN EL AULA</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><b>COMPORTAMIENTO </b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="7" class="text-left"><b>SITUACIÓN FINAL </b></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <b>(2) Competencias transversales a las áreas:</b>
        </div>
        <div class="row">    
                        GSAMA: Gestiona su aprendizaje de manera autonoma
        </div>
        <div class="row">    
                        TIC: Se desenvuelve en entornos virtuales generados por las TIC's.
        </div>
        <div style="page-break-after:always;"></div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <table border="1" class="centrartabla" cellpadding="0" cellspacing="0" style="font-size:9px;text-align:center">
                <tr class="fondo">
                    <td  colspan="2" width="271"><b>CRITERIOS DE EVALUACIÓN</b></td>
                </tr>
                <tr class="fondo">
                    <td><b>NUMERAL</b></td>
                    <td><b>LITERAL</b></td>
                </tr>
                <tr>
                    <td><b>18 AL 20</b></td>
                    <td class="text-left"> AD: LOGRO DESTACADO</td>
                </tr>
                <tr>
                    <td><b>18 AL 20</b></td>
                    <td class="text-left"> A: LOGRO PREVISTO</td>
                </tr>
                <tr>
                    <td><b>11 AL 13</b></td>
                    <td class="text-left"> B: PROCESO</td>
                </tr>
                <tr>
                    <td><b>0 AL 10</b></td>
                    <td class="text-left"> C: INICIO</td>
                </tr>
            </table>
            
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <table border="1" cellpadding="0" class="centrartabla" cellspacing="0" style="font-size:9px;text-align:center">
                <tr class="fondo">
                    <td  rowspan="2" width="140"><b>FALTAS / TARDANZAS</b></td>
                    <td  colspan="4"><b>BIMESTRE</b></td>
                    <td rowspan="2" width="70"><b>TOTAL ANUAL</b></td>
                </tr>
                <tr class="fondo">
                    <td width="20"><b>I</b></td>
                    <td width="20"><b>II</b></td>
                    <td width="20"><b>III</b></td>
                    <td width="20"><b>IV</b></td>
                </tr>
                <tr>
                    <td class="text-left">FALTAS JUSTIFICADAS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left">FALTAS INJUSTIFICADAS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left">TARDANZAS JUSTIFICADAS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left">TARDANZAS INJUSTIFICADAS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <table border="1" class="centrartabla" style="font-size:9px;text-align:center">
                <tr class="fondo text-center" >
                    <td width="500">APRECIACIÓN DEL TUTOR</td>
                </tr>
                <tr class="text-left">
                    <td width="500"><b>BIMESTRE I: </b>{{""}}</td>
                </tr>
                <tr class="text-left">
                    <td width="500"><b>BIMESTRE II: </b>{{""}}</td>
                </tr>
                <tr class="text-left">
                    <td width="500"><b>BIMESTRE III: </b>{{""}}</td>
                </tr>
                <tr class="text-left">
                    <td width="500"><b>BIMESTRE IV: </b>{{""}}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>