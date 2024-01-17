<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Dueño de la mascota') }}
                </div>
            </div>
            <hr>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nro. Identificacion') }}
                    {{ Form::text('codIdentificacion', $mascota['codIdentificacion'], ['class' => 'form-control' . ($errors->has('codIdentificacion') ? ' is-invalid' : ''), 'placeholder' => 'Documento']) }}
                    {!! $errors->first('codIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nombre de la mascota') }}
                    {{ Form::text('nombre', $mascota['nombre'], ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombres Completos']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Apellido de la mascota') }}
                    {{ Form::text('apellido', $mascota['apellido'], ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Completos']) }}
                    {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fecha de nacimiento') }}
                    {{ Form::text('fechaNacimiento', $mascota['fechaNacimiento'], ['class' => 'form-control' . ($errors->has('fechaNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                    {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Sexo') }}<br>
                    {{ Form::select('tipoSex', $tipoSex, ['class' => 'form-control' . ($errors->has('tipoSex') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de documento']) }}
                    {!! $errors->first('tipoSex', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Especie') }}<br>
                    {{ Form::select('tipoSex', $tipoSex, ['class' => 'form-control' . ($errors->has('tipoSex') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de documento']) }}
                    {!! $errors->first('tipoSex', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Raza') }}<br>
                    {{ Form::select('tipoSex', $tipoSex, ['class' => 'form-control' . ($errors->has('tipoSex') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de documento']) }}
                    {!! $errors->first('tipoSex', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Esterilizado') }}<br>
                    {{ Form::text('esterilizado', $mascota['esterilizado'], ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Completos']) }}
                    {!! $errors->first('esterilizado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
