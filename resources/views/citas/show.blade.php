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
                        <h5>Datos de la cita:</h5>
                        <div class="form-group">
                            <strong>Tipo de cita:</strong>
                            {{ $cita['tipoCita'] }}
                        </div>
                        <div class="form-group">
                            <?php if( $cita['idTipoCita'] == '6587bd8a28e28300c3fd3f55'){?>
                            <strong>Atenciones:</strong>
                            <?php $atencionesPeluqueria = $cita['atencionesPeluqueria'];
                            foreach ( $atencionesPeluqueria as $atenciones ) {?>
                            <span class="badge badge-info">{{ $atenciones }}</span>
                            <?php } } ?>
                        </div>
                        <div class="form-group">
                            <strong>Fecha de cita / Turno:</strong>
                            {{ $cita['fecha'] }} - {{ $cita['turno']}}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $cita['observaciones'] ?? 'Sin observaciones'}}
                        </div><br>
                        <h5>Datos de la mascota:</h5>
                        <div class="form-group">
                            <strong>Nombre de la mascota:</strong>
                            {{ $cita['mascota']['nombre'] }} {{ $cita['mascota']['apellido']  }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            {{ $cita['mascota']['fechaNacimiento'] }}
                        </div>
                        <div class="form-group">
                            <strong>Especie / Raza:</strong>
                            {{ $cita['mascota']['especie']['especie'] }} - {{ $cita['mascota']['raza']['raza'] }}
                        </div>
                        <div class="form-group">
                            <strong>Esterilizado:</strong>
                            {{ ($cita['mascota']['esterilizado'])?"Si":"No"}}
                        </div>
                        <br>
                        <h5>Datos del dueño:</h5>
                        <div class="form-group">
                            <strong>Dueño de la mascota:</strong>
                            {{ $cita['cliente']['tipoDocumento']['tipoDocumento'] }} {{ $cita['cliente']['documento'] }} - {{ $cita['cliente']['nombres'] }} {{ $cita['cliente']['apellidos'] }}
                        </div>
                        <div class="form-group">
                            <strong>Numero de telefono:</strong>
                            {{ $cita['cliente']['celular'] }} {{ $cita['cliente']['fijo'] }}
                        </div>
                        <div class="form-group">
                            <strong>Correo electronico:</strong>
                            {{ $cita['cliente']['email'] }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
