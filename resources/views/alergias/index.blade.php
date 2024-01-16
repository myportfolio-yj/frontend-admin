@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Alergias') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('Alergias.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nueva Alergia') }}
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
                                        <th>Nombre de alergias</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    @foreach ($alergias as $alergia)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $alergia['alergia'] }}</td>
                                            <td>
                                                <form action="{{ route('Alergias.destroy', $alergia['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('Alergias.edit', $alergia['id']) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-danger"
                                                       href="{{ route('Clientes.edit', $alergia['id']) }}"><i
                                                            class="fa fa-fw fa-trash"></i></a>
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
