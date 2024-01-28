@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de peluqueros') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('peluqueros.create') }}" class="btn btn-light btn-lg float-right"
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
                            <table class="table table-striped table-hover">
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
                                @foreach ($peluqueros as $peluquero)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $peluquero['tipoDocumento']['tipoDocumento'] }}
                                            - {{ $peluquero['documento']}}</td>
                                        <td>{{ $peluquero['nombres'] }} {{ $peluquero['apellidos'] }}</td>
                                        <td>{{ $peluquero['celular'] }} - {{ $peluquero['fijo'] }}</td>
                                        <td>{{ $peluquero['email'] }}</td>
                                        <td>
                                            <form action="{{ route('peluqueros.destroy', $peluquero['id']) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('peluqueros.edit', $peluquero['id']) }}"><i
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
