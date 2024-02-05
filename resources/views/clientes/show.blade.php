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
                            <span class="card-title">Mostrar Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Clientes') }}"> Volver atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Tipo de Documento:</strong>
                            {{ $cliente['tipoDocumento']['tipoDocumento'] }}
                        </div>
                        <div class="form-group">
                            <strong>Documento de identidad:</strong>
                            {{ $cliente['documento'] }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $cliente['nombres'] }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $cliente['apellidos'] }}
                        </div>
                        <div class="form-group">
                            <strong>Correo electronico:</strong>
                            {{ $cliente['email'] }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Celular:</strong>
                            {{ $cliente['celular'] }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Fijo:</strong>
                            {{ $cliente['fijo'] }}
                        </div>
                        {{{ print_r($cliente['mascotas']) }}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
