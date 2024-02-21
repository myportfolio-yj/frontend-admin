@extends('adminlte::page')
@section('template_title')
    Nuestras Atenciones
@endsection
@section('content')
    <style>
        .table-responsive {
            height: 550px;       /* Just for the demo          */
        }
        .btn-purple{
            color: #fff;
            background-color: #AC3B93;
            border-color: #AC3B93;
            box-shadow: none;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Atenciones') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Fecha Atención</th>
                                    <th>Cliente</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Especie / Raza</th>
                                    <th>Alergia</th>
                                    <th>Vacuna</th>
                                    <th>Historia</th>
                                    <th>Receta</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($atenciones as $atencion)
                                    <?php if($atencion['idTipoCita'] == '6587bd5b28e28300c3fd3f54') {?>
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $atencion['fecha'] }} - {{ $atencion['turno']}}</td>
                                        <td>{{ $atencion['cliente']['nombres'] }} {{ $atencion['cliente']['apellidos'] }} </td>
                                        <td>{{ $atencion['nombreMascota'] }}</td>
                                        <td>{{ $atencion['mascota']['especie']['especie'] }}
                                            - {{ $atencion['mascota']['raza']['raza'] }}</td>
                                        <td>
                                            @if( isset($atencion['mascota']['alergias']) && count($atencion['mascota']['alergias']) > 0 )
                                                Si
                                                <br>
                                                <a class="btn btn-sm btn-purple"
                                                   href="{{ route('pacienteHasAlergias.create', ['id' => $atencion['mascota']['id']]) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            @else
                                                No
                                                <br>
                                                <a class="btn btn-sm btn-secondary "
                                                   href="{{ route('pacienteHasAlergias.create', ['id' => $atencion['mascota']['id']]) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if( isset($atencion['mascota']['vacunas']) && count($atencion['mascota']['vacunas']) > 0 )
                                                Si
                                                <br>
                                                <a class="btn btn-sm btn-purple "
                                                   href="{{ route('pacienteHasVacunas.create', ['id' => $atencion['mascota']['id']]) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            @else
                                                No
                                                <br>
                                                <a class="btn btn-sm btn-secondary "
                                                   href="{{ route('pacienteHasVacunas.create', ['id' => $atencion['mascota']['id']]) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if( isset($atencion['idAtencion']) )
                                                Si
                                                <br>
                                                <a class="btn btn-sm btn-purple "
                                                   href="{{ route('historias.edit', ['historia' => $atencion['idAtencion']]) }}">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                            @else
                                                No
                                                <br>
                                                <a class="btn btn-sm btn-secondary "
                                                   href="{{ route('historias.create', ['id' => $atencion['id']]) }}">
                                                    <i class="fa fa-fw fa-book-medical"></i>
                                                </a>
                                            @endif

                                        </td>

                                        <td>
                                            @if( !isset($atencion['recetas']) )
                                                No
                                                <br>
                                                <a class="btn btn-sm btn-secondary "
                                                   href="{{ route('recetas.create', ['id' => $atencion['id']]) }}">
                                                    <i class="fa fa-fw fa-prescription"></i>
                                                </a>
                                            @else
                                                Si
                                                <br>
                                                <a class="btn btn-sm btn-purple "
                                                   href="{{ route('recetas.create', ['id' => $atencion['id']]) }}">
                                                    <i class="fa fa-fw fa-prescription"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php } ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
