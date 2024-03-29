@extends('adminlte::page')
@section('content')
    <style>
        .table-responsive {
            height: 200px;       /* Just for the demo          */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de citas vigentes') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('citas.create') }}" class="btn btn-light btn-lg float-right"
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
                                    <th>Fecha de cita / Turno</th>
                                    <th>Tipo de cita</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Especie / Raza</th>
                                    <th>Dueño de la mascota</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($citasVigentes as $cita)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cita['fecha'] }} - {{ $cita['turno'] ?? ''}}</td>
                                        <td>{{ $cita['tipoCita'] }} </td>
                                        <td>{{ $cita['mascota']['nombre'] }} {{ $cita['mascota']['apellido'] }}</td>
                                        <td>{{ $cita['mascota']['especie']['especie'] }} - {{ $cita['mascota']['raza']['raza'] }}</td>
                                        <td>{{ $cita['cliente']['nombres'] }} {{ $cita['cliente']['apellidos'] }} </td>
                                        <td>
                                            <form action=@if($cita['tipoCita'] == 'Cita Veterinaria')
                                                "{{ route('veterinariaCheckin', $cita['id']) }}"
                                            @else
                                                "{{ route('peluqueriaCheckin', $cita['id']) }}"
                                            @endif
                                            method="POST">
                                            <button class="btn btn-sm btn-primary"
                                                    type="submit"><i
                                                    class="fa fa-fw fa-book-medical"></i></button>
                                            @csrf
                                            </form>
                                            <form action="{{ route('citas.destroy', $cita['id']) }}" method="POST">
                                                <a class="btn btn-sm btn-info"
                                                   href="{{ route('citas.show', $cita['id']) }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                                <button class="btn btn-sm btn-danger"
                                                        type="submit"><i
                                                        class="fa fa-fw fa-trash"></i></button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Historio de citas') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Fecha de cita / Turno</th>
                                    <th>Tipo de cita</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Especie / Raza</th>
                                    <th>Dueño de la mascota</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cita['fecha'] }} - {{ $cita['turno'] ?? ''}}</td>
                                        <td>{{ $cita['tipoCita'] }} </td>
                                        <td>{{ $cita['mascota']['nombre'] }} {{ $cita['mascota']['apellido'] }}</td>
                                        <td>{{ $cita['mascota']['especie']['especie'] }} - {{ $cita['mascota']['raza']['raza'] }}</td>
                                        <td>{{ $cita['cliente']['nombres'] }} {{ $cita['cliente']['apellidos'] }} </td>
                                        <td>
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
