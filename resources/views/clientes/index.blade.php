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
                                {{ __('Listado de clientes') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-light btn-lg float-right"
                                   data-placement="left">
                                    <i class="fa fa-fw fa-user-plus"></i>
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
                                    <th>Nro. Documento</th>
                                    <th>Nombres completos</th>
                                    <th>Telefonos</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cliente['tipoDocumento']['tipoDocumento'] }}
                                            - {{ $cliente['documento']}}</td>
                                        <td>{{ $cliente['nombres'] }} {{ $cliente['apellidos'] }}</td>
                                        <td>{{ $cliente['celular'] }} - {{ $cliente['fijo'] }}</td>
                                        <td>{{ $cliente['email'] }}</td>
                                        <td>
                                            <form action="{{ route('clientes.destroy', $cliente['id']) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('clientes.show', $cliente['id']) }}"><i
                                                        class="fa fa-fw fa-paw"></i></a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('clientes.edit', $cliente['id']) }}"><i
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
