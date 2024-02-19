@extends('adminlte::page')
@section('content')
    <style>
        .table-responsive {
            height: 550px;       /* Just for the demo          */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Vacunas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('vacunas.create') }}" class="btn btn-light btn-lg float-right"
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
                                    <th>Nombre de la vacuna</th>
                                    <th>Duración</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($vacunas as $vacuna)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $vacuna['vacuna'] }}</td>
                                        <td>{{ $vacuna['duracion'] }} dias</td>
                                        <td width="100px">
                                            <form action="{{ route('vacunas.destroy', $vacuna['id']) }}" method="POST">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('vacunas.edit', $vacuna['id']) }}"><i
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
