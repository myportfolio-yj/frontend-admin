<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre de la Vacuna') }}
            {{ Form::text('vacuna', $vacuna['vacuna'] ?? '', ['class' => 'form-control' . ($errors->has('vacuna') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la Vacuna']) }}
            {!! $errors->first('vacuna', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Duración') }}
            {{ Form::text('duracion', $vacuna['duracion'] ?? '', ['class' => 'form-control' . ($errors->has('duracion') ? ' is-invalid' : ''), 'placeholder' => 'Duración']) }}
            {!! $errors->first('duracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
