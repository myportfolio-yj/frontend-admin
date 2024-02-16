@extends('adminlte::page')

@section('template_title')
    {{ $cita->name ?? 'Ver Cita' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Cita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Citas') }}"> Volver atras</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Fecha de cita / Turno:</strong>
                            {{ $cita['fecha'] }} - {{ $cita['turno']}}
                        </div>
                        <div class="form-group">
                            <strong>Nombre de la mascota:</strong>
                            {{ $cita['nombreMascota'] }}
                        </div>
                        <div class="form-group">
                            <strong>Especie / Raza:</strong>
                            {{ $cita['mascota']['especie']['especie'] }} - {{ $cita['mascota']['raza']['raza'] }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de cita:</strong>
                            {{ $cita['tipoCita'] }}
                        </div>
                        <div class="form-group">
                            <strong>Dueño de la mascota:</strong>
                            {{ $cita['cliente']['nombres'] }} {{ $cita['cliente']['apellidos'] }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $cita['observaciones'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
