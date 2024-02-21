@extends('adminlte::page')
@section('content')
    <style>
        .card-img-top{
            width:60px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Listado de geolocalizaciones') }}
                            </span>
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
                                    <th>Nro. Identificación</th>
                                    <th>Nombre de la mascota</th>
                                    <th>Sexo</th>
                                    <th>Especie - Raza</th>
                                    <th>Telefono de contacto</th>
                                    <th>Fecha y hora de ubicacion</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($geolocalizaciones as $geolocalizacion)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $geolocalizacion['mascota']['codIdentificacion'] }}</td>
                                        <td>{{ $geolocalizacion['mascota']['nombre'] }} {{ $geolocalizacion['mascota']['apellido'] }}</td>
                                        <td>{{ $geolocalizacion['mascota']['sexo']['sexo']}}</td>
                                        <td>{{ $geolocalizacion['mascota']['especie']['especie'] }}
                                            - {{ $geolocalizacion['mascota']['raza']['raza'] }} </td>
                                        <td>{{ $geolocalizacion['telefono'] }}</td>
                                        <td>{{ $geolocalizacion['fecha'] }} - {{ $geolocalizacion['hora'] }}</td>
                                        <?php if( $geolocalizacion['url'] == 'https://maps.google.com/?q=null,null'){?>
                                        <td>
                                                <button class="btn btn-sm btn-light" disabled>
                                                    Sin ubicación
                                                </button>
                                        </td>
                                        <?php } else {?>
                                        <td>
                                            <form action="" method="POST">
                                                <a class="btn btn-sm btn-light" target="_blank"
                                                   href="{{ $geolocalizacion['url'] }}">
                                                    <img src="{{URL::asset('/image/maps.jpg')}}" class="card-img-top" alt="Ubicación">
                                                </a>
                                                @csrf
                                            </form>
                                        </td>
                                        <?php }?>
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
