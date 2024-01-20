<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre del procedimiento') }}
            {{ Form::text('procedimiento', $procedimiento['procedimiento'] ?? '', ['class' => 'form-control' . ($errors->has('procedimiento') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del Procedimiento']) }}
            {!! $errors->first('procedimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion del procedimiento') }}
            {{ Form::text('descripcion', $procedimiento['descripcion'] ?? '', ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion del procedimiento']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
