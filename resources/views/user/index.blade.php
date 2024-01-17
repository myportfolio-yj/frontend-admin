@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de médicos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('Medicos.create') }}" class="btn btn-lg btn-light float-right"
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

                                        <th>Cod. Veterinario</th>
                                        <th>Nro de Documento</th>
                                        <th>Nombres Completos</th>
                                        <th>Telefonos</th>
                                        <th>Correo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                  @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>

                                            <td>{{ $user['codVeterinario'] }}</td>
                                            <td>{{ $user['tipoDocumento']['tipoDocumento'] }} - {{ $user['documento'] }}</td>
                                            <td>{{ $user['nombres'] }} {{ $user['apellidos'] }}</td>
                                            <td>{{ $user['celular'] }} - {{ $user['fijo'] }}</td>
                                            <td>{{ $user['email'] }}</td>

                                            <td>
                                                <form action="{{ route('Medicos.destroy', $user['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('Medicos.edit', $user['id']) }}"><i
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
