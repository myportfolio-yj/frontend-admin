<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tipo de documento') }}<br>
                    {{ Form::select('tipoDoc', $tipoDoc, $cliente['tipoDocumento']['id'] ?? null, ['class' => 'form-control custom-select' . ($errors->has('tipoDoc') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de documento']) }}
                    {!! $errors->first('tipoDoc', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nro. Documento') }}
                    {{ Form::text('documento', $cliente['documento'] ?? '', ['class' => 'form-control' . ($errors->has('documento') ? ' is-invalid' : ''), 'placeholder' => 'Documento']) }}
                    {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nombre Completo') }}
                    {{ Form::text('nombres', $cliente['nombres'] ?? '', ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres Completos']) }}
                    {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Apellido Completo') }}
                    {{ Form::text('apellidos', $cliente['apellidos'] ?? '', ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Completos']) }}
                    {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Celular') }}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-mobile-alt" aria-hidden="true"></i>
                            </span>
                        </div>
                    {{ Form::text('celular', $cliente['celular'] ?? '', ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular', 'maxlength' => '9', 'pattern' => '[0-9]{9}']) }}
                    </div>
                    {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fijo') }}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-phone-alt" aria-hidden="true"></i>
                            </span>
                        </div>
                    {{ Form::text('fijo', $cliente['fijo'] ?? '', ['class' => 'form-control' . ($errors->has('fijo') ? ' is-invalid' : ''), 'placeholder' => 'Fijo', 'maxlength' => '9', 'pattern' => '[0-9]{9}']) }}
                    </div>
                    {!! $errors->first('fijo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <?php if(!isset($cliente['email'])){ ?>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::text('email', $cliente['email'] ?? '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
