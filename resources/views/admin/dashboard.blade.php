{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">SISTEMA DE GESTIÓN CLINICA PARA CENTROS VETERINARIOS <b>AppoMSV</b></h1>
@stop

@section('content')
<br><br>
    <div class="text-center">
        <h5 class="text-left">Accesos directos:</h2><br>
        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                <a href="{{ url('/clientes') }}" class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fas-icon-dass fas fa-user-plus"></i></span>
                    <span class="info-box-text">Clientes</span>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                <a href="{{ url('/mascotas') }}" class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fas-icon-dass fas fa-paw"></i></span>
                    <span class="info-box-text">Mascotas</span>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                <a href="{{ url('/citas') }}" class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fas-icon-dass fas fa-calendar-alt"></i></span>
                    <span class="info-box-text">Citas</span>
                </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
        .fas-icon-dass{
            color: #AC3B93;
            font-size: 2.5em;
        }
        .info-box {
            cursor: pointer;
            padding: 20px;
            display: block;
            margin-bottom: 0px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            color: inherit; /* Asegura que el texto tenga el color por defecto */
            text-decoration: none; /* Elimina el subrayado de los enlaces */
        }
        .info-box-icon {
            display: block;
            width: 100% !important;
            height: 150px;
            line-height: 100px;
            text-align: center;
            margin: auto;
            font-size: 3em;
            border-radius: 10px;
            background-size: cover;
        }
        .info-box-text {
            display: block;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
