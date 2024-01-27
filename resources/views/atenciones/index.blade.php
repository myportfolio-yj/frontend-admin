@extends('adminlte::page')
@section('template_title')
    Nuestras Atenciones
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Atenciones') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('atenciones.create') }}" class="btn btn-light btn-lg float-right"
                                   data-placement="left">
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Fecha Atención</th>
                                    <th>Cliente</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Especie / Raza </th>
                                    <th>Vacuna</th>
                                    <th></th>
                                    <th>Alergia</th>
                                    <th></th>
                                    <th>Historia</th>
                                    <th>Receta</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($atenciones as $atencion)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $atencion['fecha'] }} - {{ $atencion['turno']}}</td>
                                        <td>{{ $atencion['cliente']['nombres'] }} {{ $atencion['cliente']['apellidos'] }} </td>
                                        <td>{{ $atencion['nombreMascota'] }}</td>
                                        <td> - </td>
                                        <td>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-secondary "
                                               href="{{ route('pacienteHasVacunas.create', ['id' => $atencion['id']]) }}"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                        </td>
                                        <td>
                                            @if( !isset($atencion['idAtencion']) )
                                                No
                                            @else
                                                Si
                                            @endif
                                        </td>

                                        <td>
                                            @if( !isset($atencion['receta']) )
                                                No
                                            @else
                                                Si
                                            @endif
                                        </td>

                                        <td>
                                            @if( !isset($atencion['idAtencion']) )
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('historias.create', ['id' => $atencion['id']]) }}"><i
                                                        class="fa fa-fw fa-book-medical"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-success "
                                                   href="{{ route('historias.edit', $atencion['idAtencion']) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                            @endif

                                            @if( !isset($atencion['recetas']) )
                                                <!--//Añadir Receta -->
                                                <a class="btn btn-sm btn-success "
                                                    href="{{ route('recetas.create', ['id' => $atencion['id']]) }}"><i
                                                        class="fa fa-fw fa-prescription"></i></a>
                                            @else
                                                    <!--//Editar Receta-->
                                                <a class="btn btn-sm btn-info "
                                                   href="{{ route('recetas.create', ['id' => $atencion['id']]) }}"><i
                                                        class="fa fa-fw fa-prescription"></i></a>
                                            @endif

                                        </td>
                                    </tr>
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
