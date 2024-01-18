@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Diagnosticos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('Diagnosticos.create') }}" class="btn btn-light btn-lg float-right"
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
                                        <th>Nombre de diagnosticos</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    @foreach ($diagnosticos as $diagnostico)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $diagnostico['diagnostico'] }}</td>
                                            <td>{{ $diagnostico['detalle'] }}</td>
                                            <td>
                                                <form action="{{ route('Diagnosticos.destroy', $diagnostico['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('Diagnosticos.edit', $diagnostico['id']) }}"><i
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
