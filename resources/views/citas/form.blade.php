<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Cliente') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Mascota') }}
                    <select name="" id="">
                        @foreach($mascotas as $mascota)
                            <option value="">{{ $mascota['nombre'] }} {{ $mascota['apellido'] }} - {{ $mascota['codIdentificacion'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tipo de cita') }}
                    <select name="" id="">
                        @foreach($tiposCita as $tipoCita)
                            <option value="">{{ $tipoCita['tipoCita'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tipo de atencion') }}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Veterinario') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fechas disponibles') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Turnos disponibles') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Observaciones') }}
                    {{ Form::text('observaciones', $cliente['observaciones'] ?? '', ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Fijo']) }}
                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
