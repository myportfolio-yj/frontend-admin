@extends('adminlte::page')

@section('template_title')
    {{ $cliente->name ?? 'Ver Clientes' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos del Cliente</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <strong>Tipo de Documento:</strong>
                                            {{ $cliente['tipoDocumento']['tipoDocumento'] }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Nombres:</strong>
                                            {{ $cliente['nombres'] }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Telefono Celular:</strong>
                                            {{ $cliente['celular'] }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <strong>Documento de identidad:</strong>
                                            {{ $cliente['documento'] }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Apellidos:</strong>
                                            {{ $cliente['apellidos'] }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Telefono Fijo:</strong>
                                            {{ $cliente['fijo'] }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Correo electronico:</strong>
                                            {{ $cliente['email'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <hr>
                        <h5>Mascotas del cliente</h5>
                        <hr>
                        <div class="card-columns">
                            <?php $i = 1; ?>
                            @foreach ($cliente['mascotas'] as $cli)
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <p class="card-text">
                                            <img width="150px" src="{{ $cli['lable'] }}" alt="{{ $cli['foto'] }}"><br>
                                            {{ $cli['codIdentificacion'] }}<br>
                                            {{ $cli['nombre'] }} {{ $cli['apellido'] }}<br>
                                            FN: {{ $cli['fechaNacimiento'] }}<br>
                                            Sexo: {{ $cli['sexo']['sexo'] }}<br>
                                            Especie: {{ $cli['especie']['especie'] }}<br>
                                            Raza: {{ $cli['raza']['raza'] }}<br>
                                            <?php ( $cli['esterilizado'] == 1 ? "Esterilizado" : "No esterilizado")?><br>
                                            {!!QrCode::size(120)->generate( env('APP_URL', 'http://localhost/qrvet/public/').'/identificacion/'.$cli['id']) !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Clientes') }}"> Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
