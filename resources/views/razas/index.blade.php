@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Razas por Especie') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('razas.create') }}" class="btn btn-light btn-lg float-right"
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
                                        <th>Especie</th>
                                        <th>Nombre de raza</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    @foreach ($razas as $raza)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $raza['especie']['especie'] }}</td>
                                            <td>{{ $raza['raza'] }}</td>
                                            <td>
                                                <form action="{{ route('razas.destroy', $raza['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('razas.edit', $raza['id']) }}"><i
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
