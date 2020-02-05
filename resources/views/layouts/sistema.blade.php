<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Inmobiliaria Admin - ChileNetwork</title>
    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico') }}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{ {asset('css/datepicker.css')}}" rel="stylesheet">

</head>
<body>
<div id="app">
    <!-- Preguntar por una variable de sesion e incluir la variabel nombre al template-->
    <div class="container-fluid">
        <div class="row"> 
            @include('partials.menus.top')
        </div>
        <div class="row"> 
           
            <div class="col_lg_2" id="aside_left_menu">
                @role('gerente')
                    @ include('layouts.menus.gerente')
                @endrole
                @role(['superadministrator','administrator'])
                    @ include('layouts.menus.sidebar')
                @endrole
                @php 
                //$path_temp = Request::segment(1)."/".Request::segment(2);
                @endphp
                <!--@ if(  $path_temp == "manage/dashboard" )-->
                <!-- @ else
                @ endif-->

            </div>
            <div id="mvc" class="col-md-11 ml-sm-auto col-lg-10" role="main">
                @yield('content')
            </div>
           
        </div>
        
    </div>
</div>
<!-- Scripts -->
<script src="{{asset('js/app.js')}}" defer></script>
<!--<script src="{ {asset('js/menu_condominio.js')}}"></script>
@ yield('menu_condominio_jscript')-->
</body>
</html>
