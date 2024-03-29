@extends('adminlte::page')

@section('template_title')
    Añadir Alergia al paciente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Añadir Alergia al paciente</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Alergia</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($pacienteHasAlergias as $pacienteHasAlergia)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $pacienteHasAlergia['alergia'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <form method="POST" action="{{ route('pacienteHasAlergias.store') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf

                            @include('pacienteHasAlergias.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
