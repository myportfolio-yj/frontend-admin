@extends('adminlte::page')
@section('content')
    <style>
        .table-responsive {
            height: 500px;       /* Just for the demo          */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de mascotas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('mascotas.create') }}" class="btn btn-light btn-lg float-right"
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
                            <table class="table table-sm table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Nro. Identificación</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Especie - Raza</th>
                                    <th>Esterilizado</th>
                                    <th>Dueño de mascota</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($mascotas as $mascota)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $mascota['codIdentificacion'] }}</td>
                                        <td>{{ $mascota['nombre'] }} {{ $mascota['apellido'] }}</td>
                                        <td>{{ $mascota['fechaNacimiento'] }}</td>
                                        <td>{{ $mascota['sexo']['sexo'] }}</td>
                                        <td>{{ $mascota['especie']['especie'] }} - {{ $mascota['raza']['raza'] }} </td>
                                        <td>{{ ($mascota['esterilizado'])?"Si":"No" }}</td>
                                        <td>{{ $mascota['clientes'][0]['nombres']}} {{ $mascota['clientes'][0]['apellidos']}}</td>
                                        <td>
                                            <form action="{{ route('mascotas.destroy', $mascota['id']) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('mascotas.edit', $mascota['id']) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                            </form>
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
