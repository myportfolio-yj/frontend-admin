@extends('adminlte::page')

@section('template_title')
    Añadir Vacunas al paciente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Añadir Vacunas al paciente</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Fecha de aplicación</th>
                                    <th>Vacuna</th>
                                    <th>Proxima aplicación</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($pacienteHasVacunas as $pacienteHasVacuna)
                                        <?php $nueva_fecha = date('d-m-Y', strtotime($pacienteHasVacuna['fecha']  . ' +365 days')); ?>
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $pacienteHasVacuna['fecha'] }}</td>
                                        <td>{{ $pacienteHasVacuna['vacuna'] }}</td>
                                        <td>{{ $nueva_fecha }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <form method="POST" action="{{ route('pacienteHasVacunas.store') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @include('pacienteHasVacunas.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
