@extends('adminlte::page')
@section('content')
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
                                <a href="{{ route('Citas.create') }}" class="btn btn-light btn-lg float-right"
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
                                    <th>Fecha de cita / Turno</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Especie / Raza </th>
                                    <th>Tipo de cita</th>
                                    <th>Tipo atención</th>
                                    <th>Dueño de la mascota</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($citasVigentes as $cita)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cita['fecha'] }} - {{ $cita['turno']}}</td>
                                        <td>{{ $cita['nombreMascota'] }}</td>
                                        <td> - </td>
                                        <td>{{ $cita['tipoCita'] }} </td>
                                        <td> - </td>
                                        <td>{{ $cita['cliente']['nombres'] }} {{ $cita['cliente']['apellidos'] }} </td>
                                        <td>
                                            <form action=@if($cita['tipoCita'] == 'Cita Veterinaria')
                                                "{{ route('veterinariaCheckin', $cita['id']) }}"
                                            @else
                                                "{{ route('peluqueriaCheckin', $cita['id']) }}"
                                            method="POST">
                                                <button class="btn btn-sm btn-primary"
                                                        type="submit"><i
                                                        class="fa fa-fw fa-book-medical"></i></button>
                                                @csrf
                                            </form>
                                            <form action="{{ route('Citas.destroy', $cita['id']) }}" method="POST">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('Citas.edit', $cita['id']) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection
